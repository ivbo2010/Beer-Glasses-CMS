<?php

namespace App\Http\Controllers\Admin;

use App\PubCategory;
use App\Http\Controllers\Controller;
use App\Pub;
use Illuminate\Http\Request;

class PubController extends Controller
{
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
        $data = Pub::all();
        $count = Pub::onlyTrashed()->get();
        return view( 'admin.pub.index', compact( 'data' ,'count') );
        //  ->with( 'i', ( request()->input( 'page', 1 ) - 1 ) * 5 );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = PubCategory::all();
        return view( 'admin.pub.create' )->withCategories( $categories );
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
            'category_id'     =>  'required',
            'image' => 'image'
        ] );

        $image = $request->file( 'image' );

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move( public_path( 'images' ), $new_name );
        $input_data = [
            'name'        => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image'       => $new_name
        ];

        Pub::create( $input_data );

        return redirect( 'admin/pub' )->with( 'Success', 'Pub Inserted Successfully' );
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

        $data       = Pub::findOrFail( $id );
        $categories = PubCategory::all();

        return view( 'admin.pub.show', compact( 'data', 'categories' ) );
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

        $data       = Pub::findOrFail( $id );
        $categories = PubCategory::all();

        return view( 'admin.pub.edit', compact( 'data', 'categories') );
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
                'description'     =>  'required',
                'category_id'     =>  'required',
                'image' => 'image'
            ] );

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move( public_path( 'images' ), $image_name );
        } else  // this is the else part when you dont want to update the image not required
        {
            $request->validate( [
                'name' => 'required',
                //'description'     =>  'required',
                //'category_id'     =>  'required',
            ] );
        }

        $input_data = [
            'name'        => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image'       => $image_name
        ];

        Pub::whereId( $id )->update( $input_data );

        return redirect( 'admin/pub' )->with( 'Success', 'Pub Updated Successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        $data = Pub::findOrFail( $id );
        $data->delete();

        return redirect( 'admin/pub' )->with( 'error', 'Pub Deleted Successfully ' );
    }

    public function trashed(){

        $data = Pub::onlyTrashed()->get();

        return view( 'admin/pub/trashed', compact( 'data'));

        //return view('admin.beer.trashed')->with('data',$data);
    }


    public function kill($id)
    {

        $post = Pub::withTrashed()->where('id',$id)->first();

        $post->forceDelete();

        return redirect()->back();

    }

    public function restore($id)
    {
        $post = Pub::withTrashed()->where('id',$id)->first();

        $post->restore();

        //return redirect()->route('beer');
        return redirect( 'admin/pub' );
    }
}
