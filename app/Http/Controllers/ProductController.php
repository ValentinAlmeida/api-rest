<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{

    public function index()
    {
        return Product::all();
    }

    public function store(StoreProductRequest $request)
    {
        $image = $request->file('image');

//        if ($image)
//        {
//            $path = $image->store('image', 'public');
//        }

        return Product::create($request->validated());
    }

    public function show(Product $id)
    {
        return $id;
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return $product;
    }

    public function destroy(Product $id)
    {
        $id->delete();
        return $id;
    }

    public function search($name)
    {
        return Product::where('name', 'like', '%'.$name.'%')->get();
    }
}
