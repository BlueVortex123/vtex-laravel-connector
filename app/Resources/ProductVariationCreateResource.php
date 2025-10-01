<?php

namespace App\Resources;

use Spatie\LaravelData\Data;

class ProductVariationCreateResource extends Data
{
    public function __construct(
        public string $parentProductId,
        public ?string $size,
        public string $name,
        public string $code,
        public ?string $dateCreated,
        public ?string $commercialConditionId,
    ) {}

    public function toArray(): array
    {
        return [
            "ProductId" => $this->parentProductId,
            "IsActive" => false,
            "ActivateIfPossible" => true,
            "Name" => $this->size ?? $this->name,
            "RefId" => trim($this->code),
            "PackagedHeight" => 10,
            "PackagedLength" => 10,
            "PackagedWidth" => 10,
            "PackagedWeightKg" => 10,
            "Height" => 10,
            "Length" => 10,
            "Width" => 10,
            "WeightKg" => 10,
            "CubicWeight" => null,
            "IsKit" => false,
            "CreationDate" => now(),
            "RewardValue" => null,
            "EstimatedDateArrival" => null,
            "ManufacturerCode" => null,
            "CommercialConditionId" => 1,
            "MeasurementUnit" => "un",
            "UnitMultiplier" => 1,
            "ModalType" => null,
            "KitItensSellApart" => false,
        ];
    }
}
