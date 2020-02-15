@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach($data as $beer)
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ URL::to('/') }}/images/{{ $beer->image }}"
                             alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">{{ $beer->name }}</h4>
                            <div class="card-text">{!! $beer->description !!}</div>
                            <p class="card-text">{{ $beer->category['name'] }}</p>
                            <a href="/pub/{{ $beer->id }}" class="btn btn-primary">Show</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {!! $data->links() !!}
@endsection
