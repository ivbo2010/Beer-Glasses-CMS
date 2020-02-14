<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Beer;
use App\Category;
use App\Country;
use App\Tag;

class BeerController extends Controller {
    public function __construct() {
        $this->middleware( 'auth' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //$beer = Beer::all()->paginate(3);
        //return view('admin.beer.index',compact('beer'));
        //$data = Beer::all();
        $data = Beer::all();
        $counts = Beer::count();
        return view( 'admin.beer.index', compact( 'data','counts' ) );
          //  ->with( 'i', ( request()->input( 'page', 1 ) - 1 ) * 5 );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = Category::all();
        $countries  = Country::all();
        $tags       = Tag::all();
        return view( 'admin.beer.create' )->withCategories( $categories )->withCountries( $countries )->withTags( $tags );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $request->validate( [
            'name'  => 'required',
            'description'     =>  'required',
            'qty'     =>  'required',
            'category_id'     =>  'required',
            'country_id'     =>  'required',
            'tag_id'     =>  'required',
            'image' => 'image'
        ] );

        $image = $request->file( 'image' );

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move( public_path( 'images' ), $new_name );
        $input_data = [
            'name'        => $request->name,
            'description' => $request->description,
            'qty'         => $request->qty,
            'category_id' => $request->category_id,
            'country_id'  => $request->country_id,
            'tag_id'      => $request->tag_id,
            'image'       => $new_name
        ];

        Beer::create( $input_data );

        return redirect( 'admin/beer' )->with( 'Success', 'Employee Inserted Successfully' );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        // $beer = beer::find($id);
        //return view('admin.beer.show', compact('beer'));

        $data       = Beer::findOrFail( $id );
        $categories = Category::all();
        $countries  = Country::all();
        $tags       = Tag::all();

        return view( 'admin.beer.show', compact( 'data', 'categories', 'countries', 'tags' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( $id ) {
        //$beer = beer::find($id);
        //$categories = Category::all();

        //return view('admin.beer.edit', compact('beer'));

        $data       = Beer::findOrFail( $id );
        $categories = Category::all();
        $countries  = Country::all();
        $tags       = Tag::all();

        return view( 'admin.beer.edit', compact( 'data', 'categories', 'countries', 'tags' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id ) {
        $image_name = $request->hidden_image;
        $image      = $request->file( 'image' );
        if ( $image != '' )  // here is the if part when you dont want to update the image required
        {
            $request->validate( [
                'name'  => 'required',
                //'description'     =>  'required',
                //'qty'     =>  'required',
                //'category_id'     =>  'required',
                //'country_id'     =>  'required',
                //'tag_id'     =>  'required',
                'image' => 'image'
            ] );

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move( public_path( 'images' ), $image_name );
        } else  // this is the else part when you dont want to update the image not required
        {
            $request->validate( [
                'name' => 'required',
                //'description'     =>  'required',
                //'qty'     =>  'required',
                //'category_id'     =>  'required',
                //'country_id'     =>  'required',
                //'tag_id'     =>  'required',
            ] );
        }

        $input_data = [
            'name'        => $request->name,
            'description' => $request->description,
            'qty'         => $request->qty,
            'category_id' => $request->category_id,
            'country_id'  => $request->country_id,
            'tag_id'      => $request->tag_id,
            'image'       => $image_name
        ];

        Beer::whereId( $id )->update( $input_data );

        return redirect( 'admin/beer' )->with( 'Success', 'Beer Updated Successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        $data = Beer::findOrFail( $id );
        $data->delete();

        return redirect( 'admin/beer' )->with( 'error', 'Beer Deleted Successfully ' );
    }
}
