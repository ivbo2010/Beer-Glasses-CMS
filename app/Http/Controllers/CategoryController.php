<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::latest()->paginate(10);
        return view('category.index', compact('data'))
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
        $data = Category::findOrFail($id);
        return view('category.show', compact('data'));
		
		
    }
	
	 /*  public function show(Category $category)
	  {
		 $category= $category->posts;
		return view('post.computer-id',compact('category'));
	  }
	  */


    
}