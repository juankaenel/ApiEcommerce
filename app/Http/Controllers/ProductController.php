<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Model\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{

    public function __construct()
    {
        //protegeme las rutas exceptuando al index y show
        $this->middleware('auth:api')->except('index','show');
    }

    public function index()
    {
        if (auth())
        return ProductCollection::collection(Product::paginate(20));

    }

    public function create()
    {
        //
    }


    public function store(ProductRequest $request)
    {
     $product = new Product;
     $product->name = $request->name;
     $product->detail = $request->description;
     $product->stock = $request->stock;
     $product->price = $request->price;
     $product->discount = $request->discount;

     $product->save();

     return response([
        'data' => new ProductResource($product)
     ],Response::HTTP_CREATED);
    }


    public function show(Product $product)
    {
        return new ProductResource($product);
    }



    public function update(Request $request, Product $product)
    {
        $request['detail'] = $request->description;
        unset($request['description']);
        $product->update($request->all());

        return response([
            'data' => new ProductResource($product)
        ],Response::HTTP_CREATED);

    }


    public function destroy(Product $product)
    {
        //
    }
}
