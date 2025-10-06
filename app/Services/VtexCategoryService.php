<?php

namespace App\Services;

use App\Models\Product;
use App\Models\VtexCategory;
use Illuminate\Support\Facades\DB;

class VtexCategoryService
{
    public static function mapCategories(): int
    {
        $woo_products = Product::select(['id', 'sku', 'category_id'])
            ->whereHas('category', fn($query) => $query->where('name', '<>', ''))
            ->get();

        self::createUncategorized();
        foreach ($woo_products as $product) {
            $category_string = $product->category->full_category_path ?? '';
            if ($category_string) self::categoryMapCreate($category_string);
        }

        return VtexCategory::count();
    }

    // Store category of a product in database
    protected static function categoryMapCreate(string $category_string): void
    {
        DB::transaction(function () use ($category_string) {
            $category_array = array_filter(explode('>', $category_string));
            $id_order_main = [];
            $id_order_secondary = [];

            foreach ($category_array as $index => $category_name) {
                $clone_category_array = $category_array;
                $parent = end($id_order_main);
                $category_with_brand = VtexCategory::firstOrCreate([
                    'slug' => implode('/', array_splice($clone_category_array, 0, $index + 1))
                ], [
                    'name' => $category_name,
                    'parent_id' => $parent ? $parent->id : NULL,
                ]);
                $id_order_main[] = $category_with_brand;

                if ($index >= 2) {
                    $clone_category_array = $category_array;
                    unset($clone_category_array[1]);
                    $category_without_brand = VtexCategory::firstOrCreate([
                        'slug' => implode('/', array_splice($clone_category_array, 0, $index))
                    ], [
                        'name' => $category_name,
                        'parent_id' => $index == 2 ? reset($id_order_main)->id : end($id_order_secondary)->id
                    ]);
                    $id_order_secondary[] = $category_without_brand;
                }
            }
        });
    }

    // Create NoBrand Category
    protected static function createUncategorized(): VtexCategory
    {
        return VtexCategory::firstOrCreate([
            'name' => 'Uncategorized',
            'slug' => 'Uncategorized',
            'parent_id' => null
        ]);
    }

    public function fillIdsToCategories(): void
    {
        // Assign sequential vtex_category_id to categories where it's null
        $lastId = VtexCategory::max('vtex_category_id') ?? 0;
        $categories = VtexCategory::whereNull('vtex_category_id')->orderBy('id')->get();
        foreach ($categories as $index => $category) {
            $category->vtex_category_id = $lastId + $index + 1;
            $category->save();
        }
    }
}
