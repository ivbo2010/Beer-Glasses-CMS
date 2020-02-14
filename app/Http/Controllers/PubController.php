<?php

namespace App\Http\Controllers;

use App\Pub;
use Illuminate\Http\Request;

class PubController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = Pub::latest()->paginate( 10 );

        return view( 'pub', compact( 'data' ) );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        //
    }
}
