@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="stunning-header stunning-header-bg-lightviolet">
                    <div class="stunning-header-content">
                        <h1 class="stunning-header-title">Country: {{ $data->name }}</h1>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        @foreach($data->beers as $post)
<<<<<<< HEAD
							<div class="col-sm-6 col-md-3">
=======
                            <div class="col-sm-6 col-md-3">
>>>>>>> master
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
