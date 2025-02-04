<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return response()->json($products)->setStatusCode(200);
    }

    public function show($id){
        $product = Product::find($id);
        if(isset($product)){
            return response()->json($product)->setStatusCode(200);
        }
        else{
            throw new ApiException('product not found', 404);
        }
    }

    public function store(ProductRequest $request){
        $product = Product::create($request->validated());
        return response()->json($product)->setStatusCode(201);

    }
    public function update(ProductRequest $request, $id){
        $product = Product::find($id);
        if(isset($product)){
            $product->update($request->validated());
            return response()->json($product)->setStatusCode(200);
        }
        else{
            throw new ApiException('product not found', 404);
        }
    }
    public function destroy($id){
        $product = Product::find($id);
        if(isset($product)){
            $product->delete();
            return response()->json()->setStatusCode(204);
        }else{
            throw new ApiException('product not found', 404);
        }
    }
}
