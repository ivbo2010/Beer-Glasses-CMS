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
                <h1>Home frontend</h1>

                <div class="row">
                    @foreach($data as $beer)
                        <div class="col-md-3">
                            <div class="card">
                                <img class="card-img-top" src="{{ URL::to('/') }}/images/{{ $beer->image }}"
                                    alt="Card image">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $beer->name }}</h4>
                                    <div class="card-text">{!! $beer->description !!}</div>
                                    <p class="card-text">{{ $beer->qty }}</p>
                                    <p class="card-text">{{ $beer->category['name'] }}</p>
                                    <p class="card-text">{{ $beer->country['name'] }}</p>
                                    <p class="card-text">{{ $beer->tag['name'] }}</p>
                                    <a href="/beer/{{ $beer->id }}" class="btn btn-primary">Show</a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
                {!! $data->render() !!}
                <h2>Categories</h2>
                <div class="row">
                    @foreach($category as $beer)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <p>
                                        <img src="{{ URL::to('/') }}/images/{{ $beer->image }}" width="60" height="50" />
                                    </p>
                                    <p>{{ $beer->name }}</p>
                                    <p>
                                        <a href=" /category/{{ $beer->id }}" class="btn btn-sm btn-warning"><span
                                                class="fa fa-eye"></span> Show</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <h2>Country</h2>
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
                </div>
            </div>
        </div>
    </div>
@endsection

