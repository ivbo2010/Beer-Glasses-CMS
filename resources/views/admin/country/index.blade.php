@extends('adminlte::page')
@section('title', 'Beers |  Beer Glasses Admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Country list</div>
                <div class="card-body">
                    <div class="box">
                        <div class="box-header">
                            @if(Session::has('message'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <div align="left">
                            <a href="{{ route('country.create') }}" class="btn btn-primary">
                                <span class="fa fa-plus-circle"> Country</span></a>
                        </div>
                        <br>
                    </div>
                        <div class="box-body">
                            <table id="laravel_datatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="5%">Id</th>
                                    <th>Name</th>
                                    <th>Related</th>
                                    <th width="15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $index=>$beer)
                                    <tr>
                                        <td>{{ $beer->id }}</td>
                                        <td>{{ $beer->name }}</td>
                                        <td><a href="/admin/beer?country_id={{$beer->id}}" class="btn btn-primary btn-sm">Related</a>
                                        <td>
                                            <form action="{{ route('country.destroy', $beer->id) }}" method="post">
                                                <a href="{{ route('country.show', $beer->id) }}"
                                                    class="btn btn-sm btn-warning"><span class="fa fa-eye"></span></a>
                                                @can('edit-users')
                                                    <a href="{{ route('country.edit', $beer->id) }}"
                                                        class="btn btn-sm btn-primary"><span class="fa fa-edit"></span></a>
                                                @endcan
                                                @csrf
                                                @can('delete-users')
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <span class="fa fa-trash"></span>
                                                    </button>
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
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#laravel_datatable').DataTable();
        });
    </script>
@stop
