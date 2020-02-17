<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = Category::latest()->paginate( 18 );
        return view( 'category.index', compact( 'data' ) );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        $data = Category::findOrFail( $id );
        return view( 'category.show', compact( 'data' ) );
    }
}
