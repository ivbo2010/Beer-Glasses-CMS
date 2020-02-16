<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PubResource;
use Illuminate\Http\Request;
use App\Pub;

class PubController extends Controller
{

    /**
     * PubController constructor.
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
        $pubs = Pub::paginate(10);

        if (!$pubs) {
            throw new HttpException(400, "Invalid data");
        }

        return response()->json([
            $pubs,
        ], 200);
    }

    /**
     * @param Pub $pub
     * @return PubResource
     */
    public function show(Pub $pub)
    {
        return new PubResource($pub);
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
