<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use App\Beer;
use App\Category;
use App\Tag;
use App\Country;
use App\Pub;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('search');
    }

    /**
     * search records in database and display  results
     *
     * @param  Request $request [description]
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search( Request $request)
    {

        $searchterm = $request->input('query');
       if($searchterm){
           $searchResults = (new Search())
               ->registerModel(\App\Beer::class, 'name','description')
               ->registerModel(\App\Pub::class, 'name','description')
               ->registerModel(\App\Category::class, 'name')
               ->registerModel(\App\Country::class, 'name')
               ->registerModel(\App\Tag::class, 'name')
               ->perform($searchterm);
       } else {
           $searchterm='';
       }


        return view('search', compact('searchResults', 'searchterm'));
    }
}
