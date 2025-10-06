<?php

namespace App\Resources;

use App\Models\Product;
use Spatie\LaravelData\Data;

class ProductVariationCreateResource extends Data
{
    public function __construct(
        public string $ProductId,
        public string $Name,
        public string $RefId,
    ) {}

    /**
     * Create a resource from a Product model.
     */
    public static function fromModel(Product $product): self
    {
        return new self(
            ProductId: $product->vtexExportedProduct?->vtex_product_id,
            Name: $product->name,
            RefId: trim($product->sku)
        );
    }

    /**
     * Export resource fields as array.
     */
    public function toArray(): array
    {
        return [
            'ProductId' => $this->ProductId,
            'IsActive' => false,
            'ActivateIfPossible' => true,
            'Name' => $this->Name,
            'RefId' => $this->RefId,
            'DateCreated' => now()->toDateTimeString(),
            'CommercialConditionId' => '1',
            'PackagedHeight' => 10,
            'PackagedLength' => 10,
            'PackagedWidth' => 10,
            'PackagedWeightKg' => 10,
            'Height' => 10,
            'Length' => 10,
            'Width' => 10,
            'WeightKg' => 10,
            'CubicWeight' => null,
            'IsKit' => false,
            'RewardValue' => null,
            'EstimatedDateArrival' => null,
            'ManufacturerCode' => null,
            'MeasurementUnit' => 'un',
            'UnitMultiplier' => 1,
            'ModalType' => null,
            'KitItensSellApart' => false,
        ];
    }
}
