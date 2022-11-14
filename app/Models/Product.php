<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasFactory;
    protected $fillable=(['name','category']);

    public function scopeSearchName($query,$name){
        $query->whereHas('details',function(Builder $q) use ($name){
            $q->where('name','LIKE','%'.$name.'%');
        });
    }
    public function scopeSearchTax($query,$tax){
        $query->whereHas('details',function(Builder $q) use ($tax){
            $q->where('is_tax','=',$tax);
        });
    }

    public function details(){
        return $this->hasOne(ProductDetail::class);
    }


    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
