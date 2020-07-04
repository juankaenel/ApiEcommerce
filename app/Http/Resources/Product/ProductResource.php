<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /*Información de un producto en específico (show)*/
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->detail,
            'price' => $this->price,
            'stock' => $this->stock == 0 ? 'Out of Stock' : $this->stock,
            'discount' => $this->discount,

            //variables extra
            'totalPrice' => round((1-($this->discount/100)) * $this->price,2),
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'No rating yet',
            'href' => [
                'reviews' => route('reviews.index',$this->id)
            ] //El rating solo se mostrará para aquellos productos q tenga por lo menos un review. El rating está dado por la suma de estrellas sobre la cantidad de reviews. Viene a ser el promedio de estrellas
        ];
    }
}
