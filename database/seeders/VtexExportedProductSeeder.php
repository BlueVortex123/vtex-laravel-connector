<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VtexExportedProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = DB::table('products')->get();

        $vtexExportedProducts = $products->map(function ($product) {
            return [
                'internal_product_id' => $product->id,
                'internal_product_number' => $product->sku,
                'vtex_product_id' => rand(100000, 999999), // Simulated VTEX product ID
                'vtex_sku_id' => rand(100000, 999999), // Simulated VTEX SKU ID
                'created_at' => now(),
                'updated_at' => now(),
            ];
        });

        DB::table('vtex_exported_products')->insert($vtexExportedProducts->toArray());
    }
}
