@extends('adminlte::page')
@section('title', 'Beers |  Beer Glasses Admin')

@section('content')

    <div class="container-fluid">
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">View Pub</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                @if($data->image )
                                <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-fluid" />
                                    @endif
                            </div>
                            <div class="col-md-10">
                                <label>Title: </label>
                                <h2>{{ $data->name }}</h2>
                                <div><label>Description: </label>
                                    <div>{!! $data->description !!}</div>
                                </div>
                                <div><label>Category: </label>{{ $data->category['name'] }}</div>
                                <a href="{{ route('pub.index') }}" class="btn bg-dark" style="color:white">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


