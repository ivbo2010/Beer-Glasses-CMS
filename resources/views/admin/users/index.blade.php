@extends('adminlte::page')
{{--@extends('layouts.app')--}}
@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{-- User is {{ Auth::user()->name }}--}}
                <div class="card">
                    <div class="card-header">All Users</div>
                    <div class="card-body">
                        <table id="laravel_datatable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->roles->count() > 0)
                                            <ul class="list-inline">
                                                @foreach ($user->roles as $role)
                                                    <li class="list-inline-item">{{ ucwords($role->name) }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="post">
                                            @can('edit-users')
                                                <a href="{{ route('admin.users.edit',$user->id) }}">
                                                    <button type="button" class="btn btn-sm btn-info">
                                                        <i class="fa fa-edit"></i></button>
                                                </a>
                                            @endcan
                                            @can('delete-users')
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-sm btn-warning">
                                                    <i class="fa fa-trash"></i></button>

                                            @endcan
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @if (auth()->check())
         @if (auth()->user()->isAdmin())
             Hello Admin
         @else
             Hello standard user
         @endif
     @endif--}}
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#laravel_datatable').DataTable();
        });
    </script>
@stop
