@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                {{--                <form method="get" action="{{ route('search.result') }}" class="form-inline mr-auto">
                                    <input type="text" name="query" value="{{ isset($searchterm) ? $searchterm : ''  }}" class="form-control col-sm-8"  placeholder="Search events or blog posts..." aria-label="Search">
                                    <button class="btn aqua-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Search</button>
                                </form>
                                <br>--}}

                @if ( empty ( $searchResults ) )
                    <h2>Sorry, no results<b></b>.</h2>
                @endif
                @if(isset($searchResults))
                    @if ($searchResults-> isEmpty())
                        <h2>Sorry, no results found for the term <b>"{{ $searchterm }}"</b>.</h2>
                    @else
                        <h2>There are {{ $searchResults->count() }} results for the term
                            <b>"{{ $searchterm }}"</b></h2>
                        <hr />

                        @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                            <h2>{{ ucwords($type) }}</h2>
                            <div class="row">
                                @foreach($modelSearchResults as $searchResult)
                                    <div class="col-sm-6 col-md-3">
                                        <div class="shop__thumb">
                                            <a href="{{ $searchResult->url }}">
                                                @if($searchResult->searchable->image)
                                                    <div class="shop-thumb__img">
                                                        <img src="{{ URL::to('/') }}/images/{{ $searchResult->searchable->image }}" class="img-fluid" alt="..." />
                                                    </div>
                                                @endif
                                                <h5 class="shop-thumb__title">
                                                    {{ $searchResult->title }}
                                                </h5>
                                            </a>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        @endforeach

                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
