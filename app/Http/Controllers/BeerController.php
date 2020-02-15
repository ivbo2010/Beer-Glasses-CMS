<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beer;
use App\Category;
use Spatie\Searchable\Search;
class BeerController extends Controller
{

    public function index()
    {
        $data = Beer::latest()->paginate(6);
        return view('beer.index', compact('data'));
    }


    public function show($id)
    {
        $data = Beer::findOrFail($id);
		$categories = Category::all();
        return view('beer.show', compact('data','categories'));
    }

}
