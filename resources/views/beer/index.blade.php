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
                            <p class="card-text">{{ $beer->qty }}</p>
                            <p class="card-text">{{ $beer->category['name'] }}</p>
                            <p class="card-text">{{ $beer->tag['name'] }}</p>
                            <p class="card-text">{{ $beer->country['name'] }}</p>
                            <a href="/beer/{{ $beer->id }}" class="btn btn-primary">Show</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {!! $data->links() !!}
@endsection

