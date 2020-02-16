@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
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
                                        <div class="card">
                                            <a href="{{ $searchResult->url }}">
                                                @if($searchResult->searchable->image)
                                                    <div class="shop-thumb__img">
                                                        <img src="{{ URL::to('/') }}/images/{{ $searchResult->searchable->image }}" class="img-fluid" alt="..." />
                                                    </div>
                                                @endif
                                                    <div class="card-header text-center text-black-50">
                                                        <h4> {{ $searchResult->title }}</h4>
                                                    </div>


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
