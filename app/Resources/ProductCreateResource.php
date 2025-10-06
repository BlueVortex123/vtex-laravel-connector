<?php

namespace App\Resources;

use App\Models\Product;
use Spatie\LaravelData\Data;

class ProductCreateResource extends Data
{
    public function __construct(
        public string $name,
        public int $categoryId,
        public string $brandName,
        public string $refId,
        public string $linkId,
    ) {}

    /**
     * @param object $source
     * @return self
     */
    public static function fromModel(Product $storedProduct): self
    {
        return new self(
            name: $storedProduct->name,
            categoryId: $storedProduct->category->vtex_category_id ?? 1,
            brandName: ucwords(strtolower(remove_accents(html_entity_decode($storedProduct->brand?->name)))),
            refId: $storedProduct->sku,
            linkId: $storedProduct->slugify(),
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'categoryId' => $this->categoryId,
            'brandName' => $this->brandName,
            'refId' => $this->refId,
            'linkId' => $this->linkId,
            'isVisible' => 1,
            'isActive' => 1,
            'taxCode' => '',
            'showWithoutStock' => false,
            'score' => 1,
        ];
    }
}
