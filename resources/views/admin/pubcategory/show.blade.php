@extends('adminlte::page')
@section('title', 'Beers |  Beer Glasses Admin')
@section('content')

    <div class="container-fluid">

    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">View Pub category</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <h2>{{ $data->name }}</h2>
                                <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-fluid" />
                                <div class="m-3">
                                    <a href="{{ route('pubcategory.index') }}" class="btn bg-primary" style="color:white">Cancel</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

