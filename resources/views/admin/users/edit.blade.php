@extends('adminlte::page')
{{--@extends('layouts.app')--}}
@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit user {{$user->name}}</div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.update',$user) }}" method="post">
                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--<div class="form-group row">
                                <label for="password" class="col-md-2 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="current_password">Current Password</label>
                                        <input id="current_password" type="password" class="form-control" name="current_password" required placeholder="Enter Password">
                                        @if ($errors->has('current_password'))
                                            <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input id="password" type="password" class="form-control" name="password" required placeholder="Enter at least 8 Character">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>--}}
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group row">
                                <label for="roles" class="col-md-2 col-form-label text-md-right">Roles</label>
                                <div class="col-md-6">
                                    @foreach($roles as $role)
                                        <div class="form-check">
                                            <input type="checkbox" name="roles[]" @if ($user->hasRole($role->name)) checked @endif value="{{ $role->id }}">
                                            <label>{{ $role->name }}</label>
                                        </div>
                                    @endforeach
                                    <button type="submit" class="btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
