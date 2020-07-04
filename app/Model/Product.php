<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function reviews(){
        /*un producto puede tener muchos reviews*/
        return $this->hasMany(Review::class);
    }
}
