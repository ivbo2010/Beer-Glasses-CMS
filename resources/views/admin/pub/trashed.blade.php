@extends('adminlte::page')
{{--@extends('layouts.app')--}}
@section('title', 'Dashboard')
@section('content')


    <div class="container">

        @if($message = Session::get('Success'))
            <div class="alert alert-success">
                <p align="center">{{$message}}</p>
            </div>
        @endif

        @if($message = Session::get('error'))
            <div class="alert alert-danger">
                <p align="center">{{$message}}</p>
            </div>
        @endif

    </div>
    <div class="card">
        <div class="card-header">Beers List</div>
        <div class="card-body">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div align="left">
                        <a href="/admin/pub" class="btn btn-info">
                            <span class="fa fa-plus-circle"> All pub</span></a>
                    </div>
                    <br>
                </div>
                <table id="laravel_datatable" class="table table-bordered table-striped">
                    <tr class="text-center">
                        <th width="10%">Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Category</th>
                        <th>Country</th>
                        <th>Tags</th>
                        <th>Action</th>
                    </tr>
                    @foreach($data as $beer)
                        <tbody>
                        <tr class="text-center">
                            <td><img src="{{ URL::to('/') }}/images/{{ $beer->image }}" width="60" height="50"/></td>
                            <td>{{ $beer->name }}</td>
                            <td>{{ $beer->description }}</td>
                            <td>{{ $beer->qty }}</td>
                            <td>{{$beer->category['name']}}</td>
                            <td>{{ $beer->country['name'] }}</td>
                            <td>{{ $beer->tag['name'] }}</td>
                            <td width="25%">
                                <a href="{{ route('pub.restore', $beer->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-trash-restore"></i> Restore</a>
                                @csrf
                                <a href="{{ route('pub.kill', $beer->id) }}" class="btn btn-sm btn-danger"><span
                                        class="fa fa-trash"></span></a>

                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
