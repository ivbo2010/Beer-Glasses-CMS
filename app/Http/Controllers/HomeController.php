<?php

namespace App\Http\Controllers;

use App\Country;
use App\Tag;
use Illuminate\Http\Request;
use App\Beer;
use App\Category;
class HomeController extends Controller
{
      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$data = Beer::latest()->where('status',1)->paginate(8);
		$category = Category::latest()->paginate(8);
        $country = Country::latest()->paginate(8);
        $tag = Tag::latest()->paginate(8);
        return view('site', compact('data','category','country','tag'));

    }

}
