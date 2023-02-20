<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return response()->json([
            'status' => true,
            'msg' => 'All product',
            'product' => $product
        ], 201);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'=> 'required|string',
                'description'=> 'required|string',
                'price'=> 'required|integer',
                'image'=> 'required|string',
                'category_id'=> 'required|integer'
            ]
            );

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 400);
        }

        $product = Product::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'price'=> $request->price,
            'image'=> $request->image,
            'category_id'=> $request->category_id
        ]);

        return response()->json([
            'status' => true,
            'msg' => 'Product created successfully',
            'categories' => $product
        ], 201);
    }

    public function show($id)
    {
        $product = Product::find($id);

        return $product;
        return response()->json([
            'status' => true,
            'product' => $product
        ], 201);
    }

    public function topRatedMenu(){
        $product = DB::table('products')->inRandomOrder()->limit(4)->get();
        return response()->json([
            'status' => true,
            'msg' => 'top rated menu',
            'product' => $product
        ], 201);
    }

    public function recentlyBrowsed(){
        $product = DB::table('products')->inRandomOrder()->limit(3)->get();
        return response()->json([
            'status' => true,
            'msg' => 'recently browsed',
            'product' => $product
        ], 201);
    }

    public function hotSales(){
        $product = DB::table('products')->inRandomOrder()->limit(3)->get();
        return response()->json([
            'status' => true,
            'msg' => 'hot sales',
            'product' => $product
        ], 201);
    }
}
