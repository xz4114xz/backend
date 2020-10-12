<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //如果這行未宣告，默認table為model name + s 故預設為products
    protected $table = 'product';
    protected $fillable = [
        'file', 'name','info','product_type_id','price','sort'
    ];
    public function Product_type(){
        return $this->belongsTo('App\Prodcut_type','product_type_id');
    }
}
