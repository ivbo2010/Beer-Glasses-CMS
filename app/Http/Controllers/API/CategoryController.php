<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     *
* public function show(  Category $category )
    * {
        * return new CategoryResource( $category);
    * }*/
    public function show($id)
    {
        $category= Category::with('beers')->findOrFail($id);
        $response['category']= $category;
        return response()->json($response, 200);
    }



}
