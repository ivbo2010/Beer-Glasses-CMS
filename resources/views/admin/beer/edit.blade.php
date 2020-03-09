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
                    <div class="card-header">Edit beer</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('beer.update', $data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input mdbInput type="text" class="form-control" name="name" id="name"
                                            value="{{ $data->name }}" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Qty</label>
                                        <input mdbInput type="text" class="form-control" name="qty" id="qty" value="{{ $data->qty}}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="tag">Select Country</label>
                                        <select class="form-control" name="country_id">
                                            @foreach($countries as $country)
                                                <option
                                                    value='{{ $country->id }}' {{ ($data->country_id == $country->id) ? "selected" : "" }}>{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Select Category</label>
                                        <select class="form-control" name="category_id">
                                            @foreach($categories as $category)
                                                <option
                                                    value='{{ $category->id }}' {{ ($data->category_id == $category->id) ? "selected" : "" }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tag">Select Tag</label>
                                        <select class="form-control" name="tag_id">
                                            @foreach($tags as $tag)
                                                <option
                                                    value='{{ $tag->id }}' {{ ($data->tag_id == $tag->id) ? "selected" : "" }}>{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" id="description" cols="30" rows="10"
                                            placeholder="Enter your blog content"
                                            class="form-control">{{ $data->description }}</textarea>
                                    </div>
                                    <div class="row">
                                        @if($data->image )
                                        <div class="form-group col-md-2">
                                            <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-fluid" />
                                        </div>
                                        @endif
                                        <div class="form-group col-md-10">
                                            <input type="file" name="image" id="image" class="form-control">
                                            <input type="hidden" name="hidden_image" value="{{ $data->image }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="switch">
                                            <input type="checkbox" name="status" {{ $data->status ? 'checked' : '' }}> Published
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('beer.index') }}" class="btn btn-warning">Cancel</a>
                            <button type="submit" name="add" class="btn btn-primary input-lg">Update
                                Beer
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
        $(document).ready(function () {
            $('#description').summernote({
                height: 200,
                popover: {
                    image: [],
                    link: [],
                    air: []
                }
            });
        });
    </script>
@stop

