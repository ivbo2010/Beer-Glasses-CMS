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
                    <div class="card-header">Create Pub</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('pub.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" cols="10" rows="5" placeholder="Enter your blog content" class="form-control summernote"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input mdbInput type="text" class="form-control" name="name" id="name" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Select Category</label>
                                        <select class="form-control" name="category_id">
                                            @foreach($categories as $category)
                                                <option value='{{ $category->id }}'>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="switch">
                                            <input type="checkbox" name="status"> Published
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('pub.index') }}" class="btn btn-warning">Cancel</a>
                            <button type="submit" name="add" class="btn btn-info input-lg">Create
                                pub
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

@section('js')

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
    <script>
        console.log('HiB!');
        $(document).ready(function () {
            $('#description').summernote({
                height: 200,
                popover: {
                    image: [],
                    link: [],
                    air: [],
                },
            });
        });
    </script>
@stop
