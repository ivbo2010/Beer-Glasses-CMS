@extends('adminlte::page')
@section('title', 'Beers |  Beer Glasses Admin')

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Show beer</div>
                    <div class="card-body">
                        <h2 class="left"> {{$data->name}}</h2>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-fluid" />
                                <div class="m-2">
                                    <a href="{{ route('beer.index') }}" class="btn bg-dark" style="color:white">Cancel</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div><label>Beer :</label> {{ $data->name }} </div>
                                <div><label>Description: </label> {!! $data->description !!}
                                </div>
                                <div><label>Qty :</label> {{ $data->qty }}</div>
                                <div><label>Category : </label>{{ $data->category['name'] }}</div>
                                <div><label>Country : </label>{{$data->country['name']}}</div>
                                <div><label>Tag : </label>{{ $data->tag['name']}}></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

