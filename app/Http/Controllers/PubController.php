<?php

namespace App\Http\Controllers;

use App\Pub;
use App\PubCategory;
use Illuminate\Http\Request;

class PubController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = Pub::latest()->where('status',1)->paginate( 18 );

        return view( 'pub.index', compact( 'data' ) );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        $data = Pub::findOrFail($id);
        $categories = PubCategory::all();
        return view('pub.show', compact('data', 'categories'));
    }
}
