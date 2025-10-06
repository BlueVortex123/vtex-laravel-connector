<?php

namespace App\Services;

use App\Models\Product;
use App\Models\VtexSkuSpecifications;
use App\Models\VtexSkuSpecificationsValues;
use App\Models\VtexSpecificationGroup;

class VtexSpecificationsService
{
    const GLOBAL_SPECIFICATION_GROUP_NAME = 'Specificatii';

    public function createSpecificationGroup(): VtexSpecificationGroup
    {
        return VtexSpecificationGroup::create([
            'vtex_category_id' => 0, // Vtex is assuming 0 as root category
            'vtex_specification_group_name' => self::GLOBAL_SPECIFICATION_GROUP_NAME,
            'vtex_specification_group_id' => rand(1000, 9999)
        ]);
    }

    public function createSpecificationForEveryAttribute(): void
    {
        $groupedAttributes = $this->mapAttributesToSpecifications();

        foreach ($groupedAttributes as $name => $values) {
            $vtexspecificationId = rand(1000, 9999);
            foreach ($values as $value) {
                VtexSkuSpecifications::firstOrCreate([
                    'vtex_specification_group_id' => VtexSpecificationGroup::first()->id,
                    'vtex_specification_name' => $name,
                    'vtex_specification_value_name' => $value,
                ], [
                    'vtex_specification_id' => $vtexspecificationId,
                    'vtex_specification_value_id' => null
                ]);
            }
        }
    }

    protected function mapAttributesToSpecifications(): array
    {
        $productsWithAttributes = Product::whereNotNull('attributes');
        if (!$productsWithAttributes->count()) return [];

        $pluckedAttributes = $productsWithAttributes->get()->pluck('attributes');

        $groupedAttributes = [];
        foreach ($pluckedAttributes as $attributes) {
            foreach ($attributes as $name => $value) {
                if (!isset($groupedAttributes[$name])) {
                    $groupedAttributes[$name] = [];
                }
                if (!in_array($value, $groupedAttributes[$name])) {
                    $groupedAttributes[$name][] = $value;
                }
            }
        }
        return $groupedAttributes;
    }

    public function matchExportedSpecificationToProduct(): void
    {
        $productsWithAttributes = Product::select('id', 'attributes')->whereNotNull('attributes');
        if (!$productsWithAttributes->count()) return;

        foreach ($productsWithAttributes->lazy() as $product) {
            foreach ($product->attributes as $name => $value) {
                $specification = VtexSkuSpecifications::where('vtex_specification_name', $name)
                    ->where('vtex_specification_value_name', $value)
                    ->first();

                VtexSkuSpecificationsValues::firstOrCreate([
                    'vtex_sku_id' => $product->vtexExportedProduct->vtex_sku_id,
                    'vtex_specification_id' => $specification->vtex_specification_id,
                    'vtex_specification_value_id' => $specification->vtex_specification_value_id,
                ], [
                    'vtex_response_id' => rand(1000, 9999),
                ]);
            }
        }
    }

    public function fillIdsToSpecifications(): void
    {
        $specificationsToFill = VtexSkuSpecifications::whereNull('vtex_specification_value_id');
        if (!$specificationsToFill->count()) return;

        $specificationsToFill->each(function ($specification) {
            $specification->vtex_specification_value_id = rand(1000, 9999);
            $specification->save();
        });
    }
}
