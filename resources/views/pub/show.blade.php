@extends('layouts.app')

@section('content')
<div class="container">
<h2 class="alert text-center ">Beer collection</h2>

</div>

<div class="container">
<div class="row">
<div class="col-md-12 ">


<!-- Form Name -->
<legend>Pub<span class="fa fa"> {{ $data->name }} </span></legend>

    <div class="card">
        <img class="card-img-top" src="{{ URL::to('/') }}/images/{{ $data->image }}" alt="Card image">
        <div class="card-body">
            <h4 class="card-title"><span>Pub :</span> <b>{{ $data->name }} </b></h4>
            <p class="card-text"><span>Description  </span>  <b>{!! $data->description !!}</b></p>
            <p class="card-text"><span>Category  </span>  <b>{{$data->category['name']}}</b></p>
        </div>
    </div>
</div></div></div>
@endsection

