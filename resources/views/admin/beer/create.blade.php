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
            <div class="col-lg-12">
                <h2 class="left">Beer collection</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create beer</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('beer.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input mdbInput type="text" class="form-control" name="name" id="name" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="qty">Qty</label>
                                        <input mdbInput type="text" class="form-control" name="qty" id="qty" placeholder="qty">
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
                                        <label for="category">Select Country</label>
                                        <select class="form-control" name="country_id">
                                            @foreach($countries as $country)
                                                <option value='{{ $country->id }}'>{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Select Tag</label>
                                        <select class="form-control" name="tag_id">
                                            @foreach($tags as $tag)
                                                <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" cols="10" rows="5" placeholder="Enter your blog content" class="form-control summernote"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <a href="{{ route('beer.index') }}" class="btn btn-warning">Cancel</a>
                                    <button type="submit" name="add" class="btn btn-info input-lg">
                                        Create
                                        Beer
                                    </button>
                                </div>
                            </div>
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

