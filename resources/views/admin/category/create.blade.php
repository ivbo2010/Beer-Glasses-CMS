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
                    <div class="card-header">Create category</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input mdbInput type="text" class="form-control" name="name" id="name" placeholder="Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                            </div>
                            <a href="{{ route('category.index') }}" class="btn btn-warning">Cancel</a>
                            <button type="submit" name="add" class="btn btn-primary input-lg">Create
                                category
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        //---------------------Browse image----------------
        $('#browse_file').on('click', function () {
            $('#image').click();
        })
        $('#image').on('change', function (e) {
            showFile(this, '#showImage');
        })
    </script>

@endsection
