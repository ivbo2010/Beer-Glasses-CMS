@extends('adminlte::page')
@section('title', 'Beers |  Beer Glasses Admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">View category</div>
                    <div class="card-body">
                        <h2 class="left"> Category : {{$data->name}}</h2>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-fluid" />
                                <div class="m-2">
                                    <a href="{{ route('category.index') }}" class="btn bg-primary">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

