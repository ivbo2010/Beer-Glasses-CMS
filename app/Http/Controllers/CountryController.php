<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Country::latest()->paginate(10);
        return view('country.index', compact('data'))
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
        $data = Country::findOrFail($id);
        return view('country.show', compact('data'));
    }
}