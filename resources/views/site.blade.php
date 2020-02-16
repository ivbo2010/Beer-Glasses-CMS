@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="row">
                    @foreach($data as $beer)
                        <div class="col-sm-6 col-md-3">
                            <div class="card">
                                <a href="/beer/{{ $beer->id }}">
                                    <div class="card-img">
                                        <img src="{{ URL::to('/') }}/images/{{ $beer->image }}" class="img-fluid" alt="...">
                                    </div>
                                    <div class="card-header text-center text-black-50">
                                        <h4>{{ $beer->name }}</h4>
                                    </div>
                                </a>
                            </div>
                        </div>

                    @endforeach
                </div>

                {!! $data->render() !!}
                    <div class="container m-3">
                        <div class="row">
                            <h4>Categories</h4>
                        </div>
                    </div>

                <div class="row">
                    @foreach($category as $beer)
                        <div class="col-sm-6 col-md-3">
                            <div class="card">
                                <a href="/category/{{ $beer->id }}">
                                    <div class="card-img">
                                        <img src="{{ URL::to('/') }}/images/{{ $beer->image }}" class="img-fluid" alt="...">
                                    </div>
                                    <div class="card-header text-center text-black-50">
                                       <h4>{{ $beer->name }}</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>




                    {{--           <h2>Country</h2>
                               <div class="row">
                                   @foreach($country as $beer)
                                       <div class="col-md-3">
                                           <div class="card">
                                               <div class="card-body">
                                                   <p>{{ $beer->name }}</p>
                                                   <p>
                                                       <a href=" /country/{{ $beer->id }}" class="btn btn-sm btn-warning"><span
                                                               class="fa fa-eye"></span> Show</a></p>
                                               </div>
                                           </div>
                                       </div>
                                   @endforeach
                               </div>
                               <h2>Tag</h2>
                               <div class="row">
                                   @foreach($tag as $beer)
                                       <div class="col-md-3">
                                           <div class="card">
                                               <div class="card-body">
                                                   <p>{{ $beer->name }}</p>
                                                   <p>
                                                       <a href=" /tag/{{ $beer->id }}" class="btn btn-sm btn-warning"><span
                                                               class="fa fa-eye"></span> Show</a></p>
                                               </div>
                                           </div>
                                       </div>
                                   @endforeach
                               </div>--}}
            </div>
        </div>
    </div>

@endsection

