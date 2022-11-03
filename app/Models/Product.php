<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function details(){
        return $this->hasOne(ProductDetail::class, 'details_id', 'id');
    }
}
