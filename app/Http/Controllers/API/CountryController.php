<?php

namespace App\Http\Controllers\Api;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;

class CountryController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }
    
    public function index()
    {
        return Country::all();
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
        $category= Country::with('beers')->findOrFail($id);
        $response['country']= $category;

        return response()->json($response, 200);
    }



}
