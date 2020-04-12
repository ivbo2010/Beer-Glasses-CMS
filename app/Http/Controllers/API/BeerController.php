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
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
       // $beers = Beer::with('category','tag','country')->select('name','category_id','tag_id','country_id')->paginate(2);
        $beers = Beer::with('category','tag','country')->paginate(2);

        if (!$beers) {
            throw new HttpException(400, "Invalid data");
        }

        return response()->json([
            $beers,
        ], 200);

    }

    public function create(Request $request)
    {
        return Beer::create($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param Beer $beer
     * @return \Illuminate\Http\JsonResponse
     */

    public function show($beer)
    {
          //return new BeerResource($beer);
        $beer= Beer::with('category','tag','country')->findOrFail($beer);

        return response()->json($beer, 200);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Beer::findOrFail($id)->delete();

        return ['message' => "registro removido com sucesso"];
    }

}
