<?php

namespace App\Resources;

use Spatie\LaravelData\Data;

class ProductVariationCreateResource extends Data
{
    public function __construct(
        public string $name,
        public ?int $fatherCategoryId = null,
        public string $description = '',
        public ?string $adWordsRemarketingCode = null,
        public ?string $lomadeeCampaignCode = null,
        public bool $showInStoreFront = true,
        public bool $isActive = true,
        public bool $activeStoreFrontLink = true,
        public bool $showBrandFilter = true,
        public ?int $score = null,
    ) {}

    /**
     * @return array{
     *     Name: string,
     *     FatherCategoryId: int|null,
     *     Description: string,
     *     AdWordsRemarketingCode: string|null,
     *     LomadeeCampaignCode: string|null,
     *     ShowInStoreFront: bool,
     *     IsActive: bool,
     *     ActiveStoreFrontLink: bool,
     *     ShowBrandFilter: bool,
     *     Score: int|null
     * }
     */
    public function toArray(): array
    {
        return [
            'Name' => $this->name,
            'FatherCategoryId' => $this->fatherCategoryId,
            'Description' => $this->description,
            'AdWordsRemarketingCode' => $this->adWordsRemarketingCode,
            'LomadeeCampaignCode' => $this->lomadeeCampaignCode,
            'ShowInStoreFront' => $this->showInStoreFront,
            'IsActive' => $this->isActive,
            'ActiveStoreFrontLink' => $this->activeStoreFrontLink,
            'ShowBrandFilter' => $this->showBrandFilter,
            'Score' => $this->score,
        ];
    }
}
