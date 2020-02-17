@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 m-3">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="card-img-top img-fluid" src="{{ URL::to('/') }}/images/{{ $data->image }}" alt="Card image">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h4 class="card-title"><span>Beer :</span> <b>{{ $data->name }} </b>
                                </h4>
                                <p class="card-text"><span>Description  </span>
                                    <b>{!! $data->description !!}</b></p>
                                <p class="card-text"><span>Qty  </span> <b>{{ $data->qty }}</b></p>
                                <p class="card-text"><span>Category  </span>
                                    <b>{{$data->category['name']}}</b></p>
                                <p class="card-text"><span>Country  </span>
                                    <b>{{$data->country['name']}}</b></p>
                                <p class="card-text"><span>Tag  </span>
                                    <b>{{$data->tag['name']}}</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

