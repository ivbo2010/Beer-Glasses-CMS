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

        $data = Pub::all();
        $count = Pub::onlyTrashed()->get();
        return view( 'admin.pub.index', compact( 'data' ,'count') );

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
            'name' => 'required',
            'description'     =>  'required',
            'category_id'     =>  'required',
            'image' => 'image'
        ] );

        $image = $request->file( 'image' );
        if(isset($request->status)){
            $status = true;
        }else{
            $status = false;
        }
        if ($image) {
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
        } else {
            $new_name = '';
        }

        $input_data = [
            'name'        => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'status'       => $status,
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
        if ( $image != '' )
        {
            $request->validate( [
                'name' => 'required',
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
                'description'     =>  'required',
                'category_id'     =>  'required',
                'image' => 'image'
            ] );
        }

        if(isset($request->status)){
            $status = true;
        }else{
            $status = false;
        }

        $input_data = [
            'name'        => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'status'       => $status,
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
    }


    public function kill($id)
    {

        $post = Pub::withTrashed()->where('id',$id)->first();
        $fileimage = $post->image;

        if(file_exists(public_path('images/'.$fileimage))){
            unlink(public_path('images/'.$fileimage));
        }

        $post->forceDelete();

        return redirect()->back();

    }

    public function restore($id)
    {
        $post = Pub::withTrashed()->where('id',$id)->first();

        $post->restore();

        return redirect( 'admin/pub' );
    }
}
