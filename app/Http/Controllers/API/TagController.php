<?php

namespace App\Http\Controllers\Api;

use App\Tag;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;

class TagController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }

    public function index()
    {
        return Tag::all();
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
        $category= Tag::with('beers')->findOrFail($id);
        $response['tag']= $category;

        return response()->json($response, 200);
    }



}
