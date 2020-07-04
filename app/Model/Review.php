<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    public function product(){
        /*un review pertenece a un producto*/
        return $this->belongsTo(Product::class);
    }
}

