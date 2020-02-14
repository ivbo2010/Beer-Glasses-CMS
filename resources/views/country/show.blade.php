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

                            <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb mouseover poster-3d lightbox shadow animation-disabled" data-offset="5">
                                        <img src="{{ URL::to('/') }}/images/{{ $post->image }}"  class="img-fluid" alt="our case">
                                    </div>
                                    <a href="/beer/{{ $post->id}}"><h6 class="case-item__title">{{ $post->name}}</h6></a>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

