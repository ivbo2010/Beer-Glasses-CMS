@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h1>Home frontend</h1>
                <div class="outer-container home-page">
                    <div class="container-fluid">
                        <div class="row">
                            @foreach($data as $beer)
                                <div class="col-12 col-md-6 col-lg-3 no-padding">
                                    <div class="portfolio-content">
                                        <figure>
                                            <img src="{{ URL::to('/') }}/images/{{ $beer->image }}" alt="">
                                        </figure>
                                        <div class="entry-content flex flex-column align-items-center justify-content-center">
                                            <h3>
                                                <a href="/beer/{{ $beer->id }}">{{ $beer->name }}</a>
                                            </h3>
                                            <ul class="flex flex-wrap justify-content-center">
                                                <li><a href="#">{{ $beer->category['name'] }}</a>
                                                </li>
                                                <li><a href="#">{{ $beer->tag['name'] }}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
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

