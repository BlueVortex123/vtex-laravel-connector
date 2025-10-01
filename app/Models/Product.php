<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'attributes' => 'array',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function vtexExportedProduct()
    {
        return $this->hasOne(VtexExportedProduct::class, 'internal_product_id', 'id');
    }

    //Slugify
    public function slugify(string $divider = '-'): string
    {
        $text = strtolower(html_entity_decode($this->brandName)) . '-' . $this->name . '-' . strtolower($this->sku);
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        $text = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, $divider);
        $text = preg_replace('~-+~', $divider, $text);
        $text = strtolower($text);

        if (empty($text))
            throw new \Exception('Can not generate slug for this product');

        return $text;
    }

    protected function brandName(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->brand?->name
        );
    }

    protected function size(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->toArray()['attributes']['size'] ?? null
        );
    }
}
