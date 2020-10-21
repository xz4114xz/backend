<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;

class CartController extends Controller
{
    public function addProductToCart(){
        \Cart::add(455,
            'Sample Item',
            100.99, 2,
            
        );
    }
    public function getContent(){
        $content = \Cart::getContent();
        dd($content);
    }

    public function totalCart()
    {
        $total = \Cart::getTotal();
        dd($total);
    }
}
