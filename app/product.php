<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{

    protected $table = 'product';
    protected $fillable = [
        'file', 'name','info','product_type_id','price','sort'
    ];
    public function Product_type(){
        return $this->belongsTo('App\Prodcut_type','product_type_id');
    }
}
