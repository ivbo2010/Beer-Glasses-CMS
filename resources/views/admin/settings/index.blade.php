@extends('adminlte::page')
@section('title', 'Settings')

@push('styles')

@endpush

@section('content')


    <section class="content-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> Settings</div>
                    <div class="card-body">
                        <div class="nav-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#tab_1" role="tab" data-toggle="tab">Genarel
                                        Setting</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab_2" role="tab" data-toggle="tab">Social Media</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab_3" role="tab" data-toggle="tab">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab_4" role="tab" data-toggle="tab">Address</a>
                                </li>
                            </ul>
                            <form action="{{ route('admin.settings.store') }}" method="post"
                                  enctype="multipart/form-data" role="form">
                                @csrf
                                <div class="tab-content m-2">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="box-body">
                                            <div class="form-group row">
                                                <label for="sitename" class="col-sm-2 control-label">Site Name:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="site_name" class="form-control"
                                                           id="sitename"
                                                           value="{{ $setting->site_name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="sitelogo" class="col-sm-2 control-label">Site Logo:</label>
                                                <div class="col-sm-10 col-md-6">
                                                    <input type="file" name="site_logo" class="form-control"
                                                           id="sitelogo"
                                                           value="{{ $setting->site_logo }}">
                                                </div>
                                                <div class="col-sm-10 col-md-4">
                                                    @if($setting->site_logo)
                                                        <img class="bgimage"  src="{{ asset('images/'.$setting->site_logo) }}" height="50">
                                                    @else
                                                        <img class="bgimage"  src="{{ asset('images/logo.png') }}">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="sitefavicon" class="col-sm-2 control-label">Site
                                                    Favicon:</label>
                                                <div class="col-sm-10 col-md-6">
                                                    <input type="file" name="site_favicon" class="form-control"
                                                           id="sitefavicon">
                                                </div>
                                                <div class="col-sm-10 col-md-4">
                                                    @if($setting->site_favicon)
                                                        <img src="{{ asset('images/'.$setting->site_favicon) }}"
                                                             alt="Site Favicon" class="img-responsive">
                                                    @else
                                                        <img src="{{ asset('images/favicon.ico') }}" alt="Site Logo"
                                                             class="img-responsive" width="36">
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="siteemail" class="col-sm-2 control-label">Email:</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" class="form-control" id="siteemail"
                                                           value="{{ $setting->email }}">
                                                </div>
                                            </div>

                                            <div class="form-group  row">
                                                <label for="sitephone" class="col-sm-2 control-label">Phone:</label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="phone" class="form-control"
                                                           id="sitephone"
                                                           value="{{ $setting->phone }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab_2">
                                        <div class="box-body">
                                            <div class="form-group  row">
                                                <label for="sfacebook" class="col-sm-2 control-label">Facebook:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="facebook" class="form-control"
                                                           id="sfacebook"
                                                           value="{{ $setting->facebook }}">
                                                </div>
                                            </div>
                                            <div class="form-group  row">
                                                <label for="stwitter" class="col-sm-2 control-label">Twitter:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="twitter" class="form-control" id="stwitter"
                                                           value="{{ $setting->twitter }}">
                                                </div>
                                            </div>
                                            <div class="form-group  row">
                                                <label for="slinkedin" class="col-sm-2 control-label">LinkedIn:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="linkedin" class="form-control"
                                                           id="slinkedin"
                                                           value="{{ $setting->linkedin }}">
                                                </div>
                                            </div>
                                            <div class="form-group  row">
                                                <label for="svimeo" class="col-sm-2 control-label">Vimeo:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="vimeo" class="form-control" id="svimeo"
                                                           value="{{ $setting->vimeo }}">
                                                </div>
                                            </div>
                                            <div class="form-group  row">
                                                <label for="syoutube" class="col-sm-2 control-label">Youtube:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="youtube" class="form-control" id="syoutube"
                                                           value="{{ $setting->youtube }}">
                                                </div>
                                            </div>

                                            <small class="pull-right"><em>If you don't want to show a social media on
                                                    front-end,
                                                    just leave the input field blank.</em></small>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab_3">
                                        <div class="box-body">
                                            <div class="aboutus">
                                                <label>About Us</label>
                                                <textarea id="description" class="textarea" name="about_us"
                                                          paceholder="Place some text here">{{ $setting->about_us }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab_4">
                                        <div class="box-body">
                                            <div class="address">
                                                <label>Address</label>
                                                <textarea id="description1" class="textarea" name="address" value="Place some text here">{{ $setting->address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right m-1">
                                    <button type="submit" name="genarel" class="btn btn-info"><span class="fa fa-plus-circle"></span>SAVE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>

    </style>
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
            $('#description1').summernote({
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

