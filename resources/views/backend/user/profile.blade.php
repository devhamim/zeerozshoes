@extends('layouts.dashboard')
@section('content')
    <!-- [ Layout content ] Start -->
    <div class="layout-content">

        <!-- [ content ] Start -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">Account settings</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Account settings</li>
                </ol>
            </div>
            <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light">
                    <div class="col-md-3 pt-0">
                        <div class="list-group list-group-flush account-settings-links">
                            <a class="list-group-item list-group-item-action active" data-toggle="list"
                                href="#account-general">General</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list"
                                href="#account-change-password">Change password</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list"
                                href="#account-info">Information</a>
                            {{-- <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Social links</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-connections">Connections</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-notifications">Notifications</a> --}}
                        </div>
                    </div>
                    <div class="col-md-9">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="account-general">

                                    <div class="card-body media align-items-center">
                                        @if (Auth::user()->image == null) 
                                            <img src="{{Avatar::create(Auth::user()->name)->toBase64()}}" class="d-block ui-w-80" alt="">
                                        @else
                                            <img src="{{asset('uploads/user')}}/{{Auth::user()->image}}" alt class="d-block ui-w-80">
                                        @endif
                                        {{-- <img src="assets/img/avatars/5-small.png" alt="" > --}}
                                        <div class="media-body ml-4">
                                            <label class="btn btn-outline-primary">
                                                Upload new photo
                                                <input type="file" name="image" class="account-settings-fileinput">
                                            </label> &nbsp;
                                            {{-- <button type="button" class="btn btn-default md-btn-flat">Reset</button> --}}
                                            <div class="text-light small mt-1">Allowed JPG, JPEG, GIF or PNG.</div>
                                            @error('image')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr class="border-light m-0">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control mb-1" value="{{Auth::user()->name}}">
                                            @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">E-mail</label>
                                            <input type="email" name="email" class="form-control mb-1" value="{{Auth::user()->email}}">
                                            @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-change-password">
                                    <div class="card-body pb-2">
                                        <div class="form-group">
                                            <label class="form-label">New password</label>
                                            <input type="password" name="password" class="form-control" placeholder="Enter new password">
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Repeat new password</label>
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="Re-type your new password">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-info">
                                    <div class="card-body pb-2">
                                        <div class="form-group">
                                            <label class="form-label">Bio</label>
                                            <textarea class="form-control" name="description" rows="5" placeholder="Enter your bio">{{Auth::user()->description == null ? '': Auth::user()->description}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Phone</label>
                                            <input type="tel" name="mobile" class="form-control" value="{{Auth::user()->mobile == null ? '': Auth::user()->mobile}}" placeholder="Enter your number">
                                            <div class="clearfix"></div>
                                            @error('mobile')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control" value="{{Auth::user()->address == null ? '': Auth::user()->address}}" placeholder="Enter your address">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>

            <div class="text-right mt-3">
                <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
                <a href="{{route('profile')}}" class="btn btn-default">Cancel</a>
            </div>

        </form>

        </div>
        <!-- [ content ] End -->
    @endsection
