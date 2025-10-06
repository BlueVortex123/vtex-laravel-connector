<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VtexCategory extends Model
{
    protected $guarded = ['id'];

    public function parent()
    {
        return $this->belongsTo($this::class, 'parent_id', 'id');
    }
}
