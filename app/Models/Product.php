<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at', 'pivot'];

    public function attributes()
    {
        return $this->belongsToMany(\App\Models\Attribute::class, 'attribute_product',
            'product_id',
        'attribute_id');
    }
}
