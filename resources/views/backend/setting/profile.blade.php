@extends('layouts.dashboard')
@section('content')
    <!-- [ Layout content ] Start -->
    <div class="layout-content">

        <!-- [ content ] Start -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">settings</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">settings</li>
                    <li class="breadcrumb-item active">settings</li>
                </ol>
            </div>
            <form action="{{route('setting.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class=" overflow-hidden">
                <div class="row">
                    <div class="col-md-7 m-auto card">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="account-general">
                                    <input type="hidden" name="id" value="{{ $settings->id }}">
                                    <div class="card-body media align-items-center">
                                        @if ($settings->logo == null)
                                            <img src="{{Avatar::create(Auth::user()->name)->toBase64()}}" class="d-block ui-w-80" alt="">
                                        @else
                                            <img src="{{asset('uploads/setting')}}/{{$settings->logo}}" alt class="d-block ui-w-80">
                                        @endif
                                        {{-- <img src="assets/img/avatars/5-small.png" alt="" > --}}
                                        <div class="media-body ml-4">
                                            <label class="btn btn-outline-primary">
                                                Upload new Logo
                                                <input type="file" name="logo" class="account-settings-fileinput">
                                            </label> &nbsp;
                                            {{-- <button type="button" class="btn btn-default md-btn-flat">Reset</button> --}}
                                            <div class="text-light small mt-1">Allowed JPG, JPEG, GIF or PNG.</div>
                                            @error('logo')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr class="border-light m-0">
                                    <div class="card-body media align-items-center">
                                        @if ($settings->favicon == null)
                                            <img src="{{Avatar::create(Auth::user()->name)->toBase64()}}" class="d-block ui-w-80" alt="">
                                        @else
                                            <img src="{{asset('uploads/setting')}}/{{$settings->favicon}}" alt class="d-block ui-w-80">
                                        @endif
                                        {{-- <img src="assets/img/avatars/5-small.png" alt="" > --}}
                                        <div class="media-body ml-4">
                                            <label class="btn btn-outline-primary">
                                                Upload new Favicon
                                                <input type="file" name="favicon" class="account-settings-fileinput">
                                            </label> &nbsp;
                                            {{-- <button type="button" class="btn btn-default md-btn-flat">Reset</button> --}}
                                            <div class="text-light small mt-1">Allowed JPG, JPEG, GIF or PNG.</div>
                                            @error('favicon')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr class="border-light m-0">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Website Name</label>
                                            <input type="text" name="name" class="form-control mb-1" value="{{$settings->name}}">
                                            @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">E-mail</label>
                                            <input type="email" name="email" class="form-control mb-1" value="{{$settings->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Phone</label>
                                            <input type="tel" name="phone" class="form-control" value="{{ $settings->phone }}" placeholder="Enter your number">
                                            <div class="clearfix"></div>
                                            @error('mobile')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control" value="{{ $settings->address }}" placeholder="Enter your address">
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Footer</label>
                                            <input type="text" name="footer" class="form-control" value="{{ $settings->footer }}" placeholder="Enter your address">
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title" class="form-control" value="{{ $settings->title }}" placeholder="Enter your address">
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Meta Title</label>
                                            <input type="text" name="meta_title" class="form-control" value="{{ $settings->meta_title }}" placeholder="Enter your address">
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Meta Tag</label>
                                            <input type="text" name="meta_tag" class="form-control" value="{{ $settings->meta_tag }}" placeholder="Enter your address">
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Meta Description</label>
                                            <input type="text" name="meta_description" class="form-control" value="{{ $settings->meta_description }}" placeholder="Enter your address">
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">About</label>
                                            <textarea class="form-control" name="about" rows="5" placeholder="Enter your About">{{ $settings->about }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Fb Pixel</label>
                                            <textarea class="form-control" name="fbpixel" rows="5" placeholder="Enter your Fb Pixel">{{ $settings->fbpixel }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Google Tag</label>
                                            <textarea class="form-control" name="googletag" rows="5" placeholder="Enter your Google Tag">{{ $settings->googletag }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>

            <div class="text-right mt-3">
                <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
                <a href="{{route('setting.add')}}" class="btn btn-default">Cancel</a>
            </div>

        </form>

        </div>
        <!-- [ content ] End -->
    @endsection
