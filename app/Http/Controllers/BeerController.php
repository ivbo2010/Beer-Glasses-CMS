<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beer;
use App\Category;
use Spatie\Searchable\Search;
class BeerController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = Beer::latest()->where('status',1)->paginate(18);
        return view('beer.index', compact('data'));
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $data = Beer::findOrFail($id);
		$categories = Category::all();
        return view('beer.show', compact('data','categories'));
    }

}
