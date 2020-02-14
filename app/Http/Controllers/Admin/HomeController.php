<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use App\Pub;
use App\PubCategory;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use App\Beer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users =User::count();
        $beers = Beer::count();
        $categories = Country::count();
        $countries = Country::count();
        $tags = Tag::count();
        $pubs = Pub::count();
        $pubcats = PubCategory::count();
        return view('admin.home', compact('users', 'beers', 'categories', 'countries', 'tags','pubs','pubcats'));

    }
}
