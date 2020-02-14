@extends('layouts.app')
@section('content')

<style>
        .container{
            padding:0.5%;
        }
    </style>
<div class="container">
<h2 class="alert text-center ">Beer collection</h2>

@if($message = Session::get('Success'))
<div class="alert alert-success">
<p align="center">{{$message}}</p>
</div>
@endif

@if($message = Session::get('error'))
<div class="alert alert-danger">
<p align="center">{{$message}}</p>
</div>
@endif

</div>
<div align="right">
 <a href="/admin/beer" class="btn btn-default">
 <span class="fa fa-plus-circle"> All Beer</span></a>
</div>
<table class="table table-bordered table-striped bg-dark" style="color:white; border:none">
 <tr class="text-center">
  <th width="10%">Image</th>
  <th >Name</th>
  <th >Description</th>
  <th >Qty</th>
  <th >Category</th>
  <th >Country</th>
  <th >Tags</th>
  <th >Action</th>
 </tr>
 @foreach($data as $beer)
 <tbody style="color:black; font:blod; background:#ffff">
  <tr class="text-center">
   <td><img src="{{ URL::to('/') }}/images/{{ $beer->image }}" width="60" height="50" /></td>
   <td>{{ $beer->name }}</td>
   <td>{{ $beer->description }}</td>
   <td>{{ $beer->qty }}</td>
   <td>{{$beer->category['name']}}</td>
   <td>{{ $beer->country['name'] }}</td>
   <td>{{ $beer->tag['name'] }}</td>
   <td width="25%">
	<a href="{{ route('beer.restore', $beer->id) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span> Untrash</a>
	@csrf
	<a href="{{ route('beer.kill', $beer->id) }}" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span> Delete</a>

	</form>
                <!-- ends here -->
   </td>
  </tr>
  </tbody>
 @endforeach
</table>

@endsection
