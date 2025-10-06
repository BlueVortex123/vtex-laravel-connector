<?php

namespace App\Resources;

use App\Models\VtexCategory;
use Spatie\LaravelData\Data;

class CategoryCreateResource extends Data
{
    public function __construct(
        public string $name,
        public ?int $fatherCategoryId,
    ) {}

    /**
     * Create a resource from a VtexCategory model.
     */
    public static function fromModel(VtexCategory $category): self
    {
        return new self(
            name: $category->name,
            fatherCategoryId: $category->parent->vtex_category_id,
        );
    }

    /**
     * Export resource fields as array.
     */
    public function toArray(): array
    {
        return [
            'Name' => $this->name,
            'FatherCategoryId' => $this->fatherCategoryId,
            'Description' => '',
            'AdWordsRemarketingCode' => null,
            'LomadeeCampaignCode' => null,
            'ShowInStoreFront' => true,
            'IsActive' => true,
            'ActiveStoreFrontLink' => true,
            'ShowBrandFilter' => true,
            'Score' => null,
        ];
    }
}
