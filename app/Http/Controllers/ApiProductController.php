<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Validator;
use Barryvdh\Debugbar\Facades\Debugbar;

class ApiProductController extends Controller
{

    /**
     * @OA\Get(
     *      path="/api/products",
     *      operationId="getProducts",
     *      tags={"Products"},
     *      summary="Get list of products",
     *      description="Returns list of products",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
public function index()
{
    if (config('app.debug')) {
        Debugbar::startMeasure('api', 'API Benchmark');
    }
$products = Product::paginate(15);
if (config('app.debug')) {
    Debugbar::stopMeasure('api');
}
return response()->json([
"success" => true,
"message" => "Product List",
"data" => $products
]);
}
 /**
     * @OA\Post(
     ** path="/api/products/{id}",
     *   tags={"Create Product"},
     *   summary="Create Product",
     *   operationId="createProduct",
     *
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
public function store(Request $request)
{
    if (config('app.debug')) {
        Debugbar::startMeasure('api', 'API Benchmark');
    }

$input = $request->all();
$validator = Validator::make($input, [
'name' => 'required',
'description' => 'required',
'price' => 'required',
'quantity' => 'required',
'image' => 'required'
]);
if($validator->fails()){
// return $this->sendError('Validation Error.', $validator->errors());
return response()->json(['errors' => $validator->errors()], 403);       
}
$product = Product::create($input);
if (config('app.debug')) {
    Debugbar::stopMeasure('api');
}
return response()->json([
"success" => true,
"message" => "Product created successfully.",
"data" => $product
]);
} 
/**
     * @OA\Get(
     ** path="/api/products/{id}",
     *   tags={"View Product"},
     *   summary="View Product",
     *   operationId="viewProduct",
     *
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
public function show($id)
{
    if (config('app.debug')) {
        Debugbar::startMeasure('api', 'API Benchmark');
    }

$product = Product::find($id);
if (is_null($product)) {
return $this->sendError('Product not found.');
}
if (config('app.debug')) {
    Debugbar::stopMeasure('api');
}
return response()->json([
"success" => true,
"message" => "Product retrieved successfully.",
"data" => $product
]);
}
/**
     * @OA\Put(
     ** path="/api/products/{id}",
     *   tags={"Update Product"},
     *   summary="Update Product",
     *   operationId="updateProduct",
     *
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
public function update(Request $request, Product $product)
{
    if (config('app.debug')) {
        Debugbar::startMeasure('api', 'API Benchmark');
    }
$input = $request->all();
$validator = Validator::make($input, [
'name' => 'required',
'description' => 'required',
'price' => 'required',
'quantity' => 'required',
'image' => 'required'
]);
if($validator->fails()){
return $this->sendError('Validation Error.', $validator->errors());       
}
$product->name = $input['name'];
$product->description = $input['description'];
$product->image = $input['image'];
$product->price = $input['price'];
$product->quantity = $input['quantity'];
$product->save();
if (config('app.debug')) {
    Debugbar::stopMeasure('api');
}
return response()->json([
"success" => true,
"message" => "Product updated successfully.",
"data" => $product
]);
}
/**
     * @OA\Delete(
     ** path="/api/products/{id}",
     *   tags={"Delete Product"},
     *   summary="Delete Product",
     *   operationId="deleteProduct",
     *
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
public function destroy(Product $product)
{
    if (config('app.debug')) {
        Debugbar::startMeasure('api', 'API Benchmark');
    }
$product->delete();
if (config('app.debug')) {
    Debugbar::stopMeasure('api');
}
return response()->json([
"success" => true,
"message" => "Product deleted successfully.",
"data" => $product
]);
}
}
