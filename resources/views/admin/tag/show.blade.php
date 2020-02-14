@extends('adminlte::page')
@section('title', 'Beers |  Beer Glasses Admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">View Tag</div>
                    <div class="card-body">
                        <h2>Tag: {{ $data->name }} </h2>
                        <a href="{{ route('tag.index') }}" class="btn bg-primary" style="color:white">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

