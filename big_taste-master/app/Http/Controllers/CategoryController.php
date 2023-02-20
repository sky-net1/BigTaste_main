<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return response()->json([
            'status' => true,
            'msg' => 'All Categories',
            'categories' => $category
        ], 201);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string',
                'image' => 'required|string',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $category = Category::create([
            'name' => $request->name,
            'image' => $request->image
        ]);

        return response()->json([
            'status' => true,
            'msg' => 'Category created successfully',
            'categories' => $category
        ], 201);
    }

    public function getProductsByCategory($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category->products);
    }
}
