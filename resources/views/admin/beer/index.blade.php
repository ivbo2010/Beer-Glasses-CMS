@extends('adminlte::page')
@section('title', 'Beers |  Beer Glasses Admin')

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            <div class="card">
                <div class="card-header">Beers List</div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div align="left">
                            @if(!$count->isEmpty())
                                <a href="{{ route('beer.trashed') }}" class="btn btn-danger">
                                    <span class="fa fa-plus-circle"> Trash Beer</span></a>
                            @endif
                            <a href="{{ route('beer.create') }}" class="btn btn-info">
                                <span class="fa fa-plus-circle"> Beer glass</span></a>
                        </div>
                        <br>
                    </div>
                    <div class="box-body">
                        <table id="laravel_datatable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th width="5%">Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Qty</th>
                                <th>Category</th>
                                <th>Country</th>
                                <th>Tag</th>
                                <th>Status</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $beer)
                                <tr>
                                    <td>{{ $beer->id }}</td>
                                    <td>
                                        <img src="{{ URL::to('/') }}/images/{{ $beer->image }}" width="60" height="50" />
                                    </td>
                                    <td>{{ $beer->name }}</td>
                                    <td>{!! $beer->description !!}</td>
                                    <td>{{ $beer->qty }}</td>
                                    <td>{{$beer->category['name']}}</td>
                                    <td>{{ $beer->country['name'] }}</td>
                                    <td>{{ $beer->tag['name'] }}</td>
                                    <td>{{ ($beer->status == 1) ? "Publishes" : "Unpublished" }}</td>
                                    <td>
                                        <form action="{{ route('beer.destroy', $beer->id) }}" method="post">
                                        <a href="{{ route('beer.show', $beer->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-eye"></span></a>
                                        @can('edit-users')
                                        <a href="{{ route('beer.edit', $beer->id) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>
                                        @endcan
                                        @can('delete-users')
                                            @method('DELETE')

                                                <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$beer->id}})"
                                                    data-target="#DeleteModal" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>
                                                </a>

                                        @endcan
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="DeleteModal" class="modal fade text-danger" role="dialog">
                        <div class="modal-dialog ">
                            <!-- Modal content-->
                            <form action="" id="deleteForm" method="post">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
                                    </div>
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <p class="text-center">Are You Sure Want To Delete ?</p>
                                    </div>
                                    <div class="modal-footer text-center">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">
                                            Cancel
                                        </button>
                                        <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">
                                            Yes, Delete
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#laravel_datatable').DataTable();
        });

        function deleteData(id) {
            var id = id;
            var url = '{{ route("beer.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@stop
