@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="stunning-header stunning-header-bg-lightviolet">
                    <div class="stunning-header-content">

                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="shop__thumb">
                                    <div class="card-header text-center">
                                        <h1 class="stunning-header-title">{{ $data->name }}</h1>
                                    </div>
                                    <div class="card-header text-center text-black-50">
                                        <h4>TAGS</h4>
                                    </div>
                            </div>
                        </div>
                        @foreach($data->beers as $beer)
                            <div class="col-md-3">
                                <div class="shop__thumb">
                                    <a href="/beer/{{ $beer->id }}">
                                        <div class="card-img">
                                            <img src="{{ URL::to('/') }}/images/{{ $beer->image }}" class="img-fluid"
                                                 alt="...">
                                        </div>
                                        <div class="card-header text-center text-black-50">
                                            <h4>{{ $beer->name }}</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
