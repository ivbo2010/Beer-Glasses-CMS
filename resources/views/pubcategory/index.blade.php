@extends('layouts.app')
@section('content')

<style>
        .container{
            padding:0.5%;
        }
    </style>
<div class="container">
<h2 class="alert text-center "><span class="fas fa-beer"> Beer collection</span></h2>

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
<div class="container">
<div align="right">
 <a href="{{ route('category.create') }}" class="btn btn-warning">
 <span class="fa fa-plus-circle"> Add New Pub category</span></a>
</div>

<table class="table table-bordered table-striped bg-info" style="color:white; border:none">
 <tr class="text-center">
  <th width="10%">Image</th>
  <th >Name</th>
  <th >Action</th>
 </tr>
 @foreach($data as $category)
 <tbody style="color:black; font:blod; background:#ffff">
  <tr class="text-center">
   <td><img src="{{ URL::to('/') }}/images/{{ $category->image }}" width="60" height="50" /></td>
   <td>{{ $category->name }}</td>
   <td width="45%">
   <!-- here is the button action side where you can edit . view and delete the category record -->
   <form action="{{ route('category.destroy', $category->id) }}" method="post">
	<a href="{{ route('category.show', $category->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-eye"></span> Show</a>
	<a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span> Edit</a>
	@csrf
	@method('DELETE')
	<button type="submit" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span> Delete</button>
	</form>
                <!-- ends here -->
   </td>
  </tr>
  </tbody>
 @endforeach
</table>
</div>
<div class="container">
{!! $data->links() !!}
</div>
@endsection