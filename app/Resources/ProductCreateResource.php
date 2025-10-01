<?php

namespace App\Resources;

use App\Models\Product;
use Spatie\LaravelData\Data;

class ProductCreateResource extends Data
{
    public function __construct(
        public string $Name,
        public int $CategoryId,
        public string $BrandName,
        public string $RefId,
        public string $LinkId,
        public int $IsVisible,
        public int $IsActive,
        public string $TaxCode,
        public bool $ShowWithoutStock,
        public int $Score
    ) {}

    /**
     * @param object $source
     * @return self
     */
    public static function fromSource(Product $storedProduct): self
    {
        $brandName = $storedProduct->Brands ?? $storedProduct->{'Product Designer'} ?? '';
        if ($brandName === '') {
            $brandName = 'NoBrand';
        }

        return new self(
            Name: $storedProduct->Title,
            CategoryId: $storedProduct->get_vtexCategory()->vtex_category_id ?? 1,
            BrandName: ucwords(strtolower(remove_accents(html_entity_decode($brandName)))),
            RefId: $storedProduct->sku,
            LinkId: $storedProduct->slugify(),
            IsVisible: 1,
            IsActive: 1,
            TaxCode: '',
            ShowWithoutStock: false,
            Score: 1
        );
    }
}
