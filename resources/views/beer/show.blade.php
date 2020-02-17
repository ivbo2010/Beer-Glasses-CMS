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
                                    {!! $data->description !!}</p>
                                <p class="card-text"><span>Qty:  </span> <b>{{ $data->qty }}</b></p>

                                    <div>Category: <a href="/category/{{ $data->category_id}}">{{ $data->category['name'] }}</a></div>
                                    <div>Tag :<a href="/tag/{{ $data->tag_id}}">{{ $data->tag['name'] }}</a></div>
                                    <div>Country: <a href="/country/{{ $data->country_id}}">{{ $data->country['name'] }}</a></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
