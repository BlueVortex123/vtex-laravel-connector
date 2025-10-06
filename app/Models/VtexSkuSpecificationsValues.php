<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VtexSkuSpecificationsValues extends Model
{
    protected $guarded = ['id'];

    public function sku()
    {
        return $this->belongsTo(VtexExportedProduct::class, 'vtex_sku_id');
    }

    public function specification()
    {
        return $this->belongsTo(VtexSkuSpecifications::class, 'vtex_specification_id');
    }
}
