<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $table = 'productimages';
    protected $fillable = [
        'product_image', 'product_id'
    ];
    public function Product(){
        return $this->belongsTo('App\product','product_id');
    }
}
