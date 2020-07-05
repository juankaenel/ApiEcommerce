<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{

    protected $fillable = [
        'customer', 'star', 'review'
    ];

    public function product(){
        /*un review pertenece a un producto*/
        return $this->belongsTo(Product::class);
    }
}

