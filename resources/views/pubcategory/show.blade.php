@extends('layouts.app')

@section('content')

<style>
        .container{
            padding:0.5%;
        }
    </style>
<div class="container">
<h2 class="alert text-center "><span class="fas fa-beer"> Beer collection</span></h2>

</div>

<div class="container">
<div class="row">
<div class="col-md-10 ">
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Pub Category <span class="fa fa"> {{ $data->name }} </span></legend>



<div class="jumbotron text-center">
 <div align="center">
 <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="rounded-circle" width='100' height="100" />
<div align="center">
<h3><span >Category :</span> <b>{{ $data->name }} </b> </h3>
</div>
<a href="/" class="btn bg-primary" style="color:white">Cancel</a>

</div>
@endsection

