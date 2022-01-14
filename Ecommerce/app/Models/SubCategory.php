<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table='sub_categories';
    public function Cate(){
        return $this->belongsTo(Category::class);
    }

    public function prod(){
        return $this->hasMany(Product::class);
    }
}
