<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//el Resource y ApiResource se diferencia en que en el apiResource no incluye las rutas edit y create
Route::apiResource('/products','ProductController');

Route::group(['prefix'=>'products'],function (){
    Route::apiResource('/{product}/reviews','ReviewController');
});

