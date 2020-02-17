<?php

namespace App\Http\Controllers;

use App\PubCategory;
use Illuminate\Http\Request;


class PubCategoryController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = PubCategory::latest()->paginate(18);
        return view('pubcategory.index', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        $datashow = PubCategory::findOrFail($id);
        return view('pubcategory.show', compact('datashow'));
    }
}
