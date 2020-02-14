<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tag::latest()->paginate(5);
        return view('tag.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Tag::findOrFail($id);
        return view('tag.show', compact('data'));

    }


}
