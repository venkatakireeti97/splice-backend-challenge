<?php

namespace App\Http\Controllers;

use App\Data\DataTransferObjects\ProductData;
use App\Data\Models\Product;
use App\Domains\Product\Requests\InsertOrUpdateProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShopifyWebhookProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(protected ProductService $productService)
    {
    }

    public function index(Request $request)
    {
        $products = Product::paginate(15);
        return response()->json([
        "success" => true,
        "message" => "Product List",
        "data" => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        return response()->json([
        "success" => true,
        "message" => "Product created successfully.",
        "data" => $product
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
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
        return response()->json([
        "success" => true,
        "message" => "Product updated successfully.",
        "data" => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
        "success" => true,
        "message" => "Product deleted successfully.",
        "data" => $product
        ]);
    }
}