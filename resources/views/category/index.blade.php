@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach($data as $beer)
                <div class="col-md-3">
                    <div class="card">
                        <a href="/category/{{ $beer->id }}">
                            <div class="card-img">
                                <img src="{{ URL::to('/') }}/images/{{ $beer->image }}" class="img-fluid" alt="...">
                            </div>
                            <div class="card-header text-center text-black-50">
                                <h4>{{ $beer->name }}</h4>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {!! $data->links() !!}
@endsection
