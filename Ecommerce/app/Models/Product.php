<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';

    public function Images(){
        return $this->hasMany(ProductImage::class);
    }

    public function prodAttr(){
        return $this->hasMany(ProductAttributesAssoc::class);
    }

    public function sbCat(){
        return $this->belongsTo(SubCategory::class);
    }
}
