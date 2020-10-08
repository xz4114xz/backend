<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $fillable = [
        'Title', 'InnerText','SubTitle','ImageURL'
    ];

    protected $hidden = [
        'id'
    ];
}
