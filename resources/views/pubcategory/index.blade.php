@extends('layouts.app')
@section('content')
    <div class="outer-container list-page">
        <div class="container-fluid">
            <div class="col-lg-12 left-margin">
                <div class="row">
                    @foreach($data as $beer)
                        <div class="col-6 col-md-4 col-sm-3 col-lg-3 no-padding">
                            <div class="portfolio-content">
                                <figure>
                                    <img src="{{ URL::to('/') }}/images/{{ $beer->image }}" alt="">
                                </figure>
                                <div class="entry-content flex flex-column align-items-center justify-content-center">
                                    <h3>
                                        <a href="/pubcategory/{{ $beer->id }}">{{ $beer->name }}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center">{!! $data->render() !!}</div>
            </div>
        </div>
    </div>
@endsection
