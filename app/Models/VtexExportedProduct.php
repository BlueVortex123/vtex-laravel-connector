<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VtexExportedProduct extends Model
{
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'internal_product_id', 'id');
    }
}
