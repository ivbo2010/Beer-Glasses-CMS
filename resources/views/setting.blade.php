@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($settings as $beer)
                <img src="{{ URL::to('/') }}/images/{{ $beer->site_logo }}" height="30" alt="...">
            @endforeach
        </div>
    </div>
@endsection
