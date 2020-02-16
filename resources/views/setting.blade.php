@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($sdata as $beer)
                <div class="col-sm-6 col-md-3">
                    <div class="card">
                        <h5 class="container">
                            {{ $beer->email }}
                        </h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
