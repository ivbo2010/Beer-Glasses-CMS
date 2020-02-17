@extends('layouts.app')
@section('content')
    <div class="outer-container list-page">
        <div class="container-fluid left-margin">
            <div class="row">
                @foreach($data as $beer)
                    <div class="col-6 col-md-4 col-sm-2 col-lg-2 no-padding">
                        <div class="portfolio-content">
                            <figure>
                                <img src="{{ URL::to('/') }}/images/{{ $beer->image }}" alt="">
                            </figure>
                            <div class="entry-content flex flex-column align-items-center justify-content-center">
                                <h3>
                                    <a href="/beer/{{ $beer->id }}">{{ $beer->name }}</a>
                                </h3>
                                <ul class="flex flex-wrap justify-content-center">
                                    <li><a href="/category/{{ $beer->category_id}}">{{ $beer->category['name'] }}</a></li>
                                    <li><a href="/tag/{{ $beer->tag_id}}">{{ $beer->tag['name'] }}</a></li>
                                    <li><a href="/country/{{ $beer->country_id}}">{{ $beer->country['name'] }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center">{!! $data->render() !!}</div>
        </div>
    </div>
@endsection
