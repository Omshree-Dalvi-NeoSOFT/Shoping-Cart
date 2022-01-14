<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributesAssoc extends Model
{
    use HasFactory;
    public function Attris(){
        return $this->belongsTo(Product::class);
    }
}
