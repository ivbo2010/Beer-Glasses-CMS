<?php

namespace App\Http\Controllers\API;

use App\Beer;
use App\Http\Controllers\Controller;
use App\Http\Resources\BeerResource;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    /**
     * BeerController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beers = Beer::paginate(10);

        if (!$beers) {
            throw new HttpException(400, "Invalid data");
        }

        return response()->json([
            $beers,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param Beer $beer
     * @return BeerResource
     */

    public function show(Beer $beer)
    {
        return new BeerResource($beer);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
