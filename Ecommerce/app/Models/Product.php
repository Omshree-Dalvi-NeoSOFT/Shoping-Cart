<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    public function ProdCat(){
        return $this->hasMany(ProductCategory::class);
    }

    public function Images(){
        return $this->hasMany(ProductImage::class);
    }

    public function ProdAttr(){
        return $this->hasMany(ProductAttributesAssoc::class);
    }

    public function SbCat(){
        return $this->belongsTo(SubCategory::class);
    }
}
