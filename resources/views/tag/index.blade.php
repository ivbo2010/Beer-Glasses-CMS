@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach($data as $beer)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $beer->name }}</h4>
                            <a href="/tag/{{ $beer->id }}" class="btn btn-primary">Show</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {!! $data->links() !!}
@endsection
