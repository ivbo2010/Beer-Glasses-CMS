<?php

namespace App\Http\Controllers\Api;

use App\PubCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\PubCategoryResource;
use Illuminate\Http\Request;

class PubCategoryController extends Controller
{
    public function index()
    {
        return PubCategory::all();
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
        $category= PubCategory::with('pub')->findOrFail($id);
        return response()->json($category, 200);
    }



}
