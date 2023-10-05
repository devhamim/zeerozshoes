@extends('backend.app')

@section('content')
 <!-- main content start -->
 <div class="main-content">
    <div class="dashboard-breadcrumb mb-30">
        <h2>View Setting</h2>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-body">
                    <div class="profile-sidebar">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="profile-sidebar-title">Website Information</h5>
                            <div class="dropdown">

                            </div>
                        </div>
                        <div class="top">
                            <div class="image-wrap">
                                <div class="part-img ">
                                    <img src="{{ asset('uplode/logo') }}/{{ $settings->first()->logo }}" class="img-fluid circle w-100" alt="Logo" />
                                </div>
                                {{-- <button class="image-change"><i class="fa-light fa-camera"></i></button> --}}
                            </div>
                            <div class="part-txt">
                                <h4 class="admin-name">{{ $settings->first()->name }}</h4>
                                <span class="admin-role">

                                </span>
                                <div class="admin-social">
                                    <a href="{{ $settings->first()->facebook }}"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="{{ $settings->first()->twitter }}"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="{{ $settings->first()->linkedin }}"><i class="fa-brands fa-linkedin"></i></a>
                                    <a href="{{ $settings->first()->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="bottom">
                            <h6 class="profile-sidebar-subtitle">Communication Info</h6>
                            <ul>
                                <li><span>Full Name:</span>{{ $settings->first()->name }}</li>
                                <li><span>Title:</span>{{ $settings->first()->title }}</li>
                                <li><span>Mobile:</span>{{ $settings->first()->phone }}</li>
                                <li><span>Mail:</span>{{ $settings->first()->email }}</li>
                                <li><span>Address:</span>{{ $settings->first()->address }}</li>
                                <li><span>Footer Rights:</span>{{ $settings->first()->footer }}</li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel">
                <div class="panel-header">
                    <nav>
                        <div class="btn-box d-flex flex-wrap gap-1" id="nav-tab" role="tablist">
                            <button class="btn btn-sm btn-outline-primary active" id="nav-edit-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-edit-profile" type="button" role="tab" aria-controls="nav-edit-profile" aria-selected="true">Edit Profile</button>
                        </div>
                    </nav>
                </div>
                <div class="panel-body">
                    <div class="tab-content profile-edit-tab" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-edit-profile" role="tabpanel" aria-labelledby="nav-edit-profile-tab" tabindex="0">
                            <form action="{{ route('setting.update', $settings->first()->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="profile-edit-tab-title">
                                    <h6>Private Information</h6>
                                </div>
                                <div class="private-information mb-30">
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-light fa-link"></i></span>
                                                <input type="text" class="form-control" placeholder="Website Name" name="name" value="{{ $settings->first()->name }}">
                                                @error('name')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-light fa-envelope"></i></span>
                                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $settings->first()->email }}">
                                                @error('email')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-light fa-phone"></i></span>
                                                <input type="tel" class="form-control" placeholder="Phone" name="phone" value="{{ $settings->first()->phone }}">
                                                @error('phone')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-light fa-image"></i></span>
                                                <input type="file" class="form-control" placeholder="Logo" name="logo" value="{{ $settings->first()->logo }}">

                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-light fa-image"></i></span>
                                                <input type="file" class="form-control" placeholder="Favicon" name="favicon" value="{{ $settings->first()->favicon }}">

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <textarea class="form-control h-100-p" placeholder="Address" name="address">{{ $settings->first()->address }}</textarea>
                                            @error('address')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                        </div>
                                        <div class="col-12">
                                            <textarea class="form-control h-100-p" placeholder="Website Title" name="title">{{ $settings->first()->title }}</textarea>
                                            @error('title')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <textarea class="form-control h-100-p" placeholder="Footer Rights" name="footer">{{ $settings->first()->footer }}</textarea>
                                            @error('footer')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-edit-tab-title">
                                    <h6>Social Information</h6>
                                </div>
                                <div class="social-information">
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-brands fa-facebook-f"></i></span>
                                                <input type="url" class="form-control" placeholder="Facebook" name="facebook">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-brands fa-twitter"></i></span>
                                                <input type="url" class="form-control" placeholder="Twitter" name="twitter">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-brands fa-linkedin-in"></i></span>
                                                <input type="url" class="form-control" placeholder="Linkedin" name="linkedin">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-brands fa-instagram"></i></span>
                                                <input type="url" class="form-control" placeholder="Instagram" name="instagram">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- footer start -->
    <div class="footer">
        @include('backend.layouts.footer')
    </div>
    <!-- footer end -->
</div>
<!-- main content end -->
@endsection
