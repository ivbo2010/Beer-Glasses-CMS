@extends('adminlte::page')
@section('title', 'Beers |  Beer Glasses Admin')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Country</div>
                    <div class="card-body">
                <form method="post" action="{{ route('country.update', $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input mdbInput type="text" class="form-control" name="name" id="name" value="{{ $data->name }}" placeholder="Country">
                        </div>
                    </div>
                    <a href="{{ route('country.index') }}" class="btn btn-warning">Cancel</a>
                    <button type="submit" name="add" class="btn btn-primary input-lg">Create country
                    </button>
                </form>
                    </div></div>
            </div>
        </div>
    </div>

@endsection

