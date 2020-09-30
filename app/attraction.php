<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attraction extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = [
         'email', 'location','file','Attractions_name','info'
    ];
}
