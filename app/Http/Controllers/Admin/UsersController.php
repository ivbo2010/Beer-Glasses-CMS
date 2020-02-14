<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller {
    public function __construct() {
        $this->middleware( 'auth' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $users = User::all();

        return view( 'admin.users.index' )->with( 'users', $users );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show( User $user ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( User $user ) {
        //dd($user);

        if ( Gate::denies( 'edit-users' ) ) {
            return redirect( route( 'admin.users.index' ));
        }

        $roles = Role::all();

        return view( 'admin.users.edit' )->with( [
            'user'  => $user,
            'roles' => $roles
        ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, User $user ) {
        //dd($request);
        $user->roles()->sync( $request->roles );
        $user->name = $request->name;
        $user->email = $request->email;
       // $user->password = $request->password;
        if($user->save()){
            $request->session()->flash('success', '"'.$user->name.'" has been updated');
        } else {
            $request->session()->flash('error','There was en error updating the user');
        }


        //$request->session()->flash('warning','Test messages warning');

        return redirect()->route( 'admin.users.index' );
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy( User $user ) {

        if ( Gate::denies( 'delete-users' ) ) {
            return redirect( route( 'admin.users.index' ));
        }

        $user->roles()->detach();
        $user->delete();

        return redirect()->route( 'admin.users.index' );
    }
}
