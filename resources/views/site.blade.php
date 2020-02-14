@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="row">
                    @foreach($data as $beer)
                        <div class="col-sm-6 col-md-3">
                            <div class="shop__thumb">
                                <a href="/beer/{{ $beer->id }}">
                                    <div class="shop-thumb__img">
                                        <img src="{{ URL::to('/') }}/images/{{ $beer->image }}" class="img-fluid" alt="...">
                                    </div>
                                    <h5 class="shop-thumb__title">
                                        {{ $beer->name }}
                                    </h5>
                                </a>
                            </div>
                        </div>

                    @endforeach
                </div>
                {!! $data->render() !!}
                <h2>Categories</h2>
                <div class="row">
                    @foreach($category as $beer)
                        <div class="col-sm-6 col-md-3">
                            <div class="shop__thumb">
                                <a href="/category/{{ $beer->id }}">
                                    <div class="shop-thumb__img">
                                        <img src="{{ URL::to('/') }}/images/{{ $beer->image }}" class="img-fluid" alt="...">
                                    </div>
                                    <h5 class="shop-thumb__title">
                                        {{ $beer->name }}
                                    </h5>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
     {{--           <h2>Country</h2>
                <div class="row">
                    @foreach($country as $beer)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <p>{{ $beer->name }}</p>
                                    <p>
                                        <a href=" /country/{{ $beer->id }}" class="btn btn-sm btn-warning"><span
                                                class="fa fa-eye"></span> Show</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <h2>Tag</h2>
                <div class="row">
                    @foreach($tag as $beer)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <p>{{ $beer->name }}</p>
                                    <p>
                                        <a href=" /tag/{{ $beer->id }}" class="btn btn-sm btn-warning"><span
                                                class="fa fa-eye"></span> Show</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>--}}
            </div>
        </div>
    </div>

@endsection

