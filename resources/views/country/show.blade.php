@extends('layouts.app')

@section('content')

    <style>
        .container {
            padding: 0.5%;
        }
    </style>
    <div class="container">
        <h2 class="alert text-center "><span class="fas fa-beer"> Beer collection</span></h2>

    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10 ">


                <!-- Form Name -->
                <legend>Country <span class="fa fa"> {{ $data->name }} </span></legend>

                <div class="container">
                    <div class="row">


                        @foreach($data->beers as $post)
							<div class="col-sm-6 col-md-3">
                                <div class="shop__thumb">
                                    <a href="/beer/{{ $post->id}}">
                                        <div class="shop-thumb__img">
                                            <img src="{{ URL::to('/') }}/images/{{ $post->image }}" class="img-fluid" alt="our case">
                                        </div>
                                        <h5 class="shop-thumb__title">
                                            {{ $post->name}}
                                        </h5>
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

