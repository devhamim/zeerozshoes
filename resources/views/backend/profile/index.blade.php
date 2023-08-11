@extends('backend.app')

@section('content')
 <!-- main content start -->
 <div class="main-content">
    <div class="dashboard-breadcrumb mb-30">
        <h2>View Profile</h2>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-body">
                    <div class="profile-sidebar">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="profile-sidebar-title">User Information</h5>
                            <div class="dropdown">
                                
                            </div>
                        </div>
                        <div class="top">
                            <div class="image-wrap">
                                <div class="part-img rounded-circle overflow-hidden">
                                    @if(Auth::user()->photo == null)
                                        <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" class="img-fluid circle" alt="" />
                                    @else
                                        <img src="{{ asset('uplode/profile') }}/{{ Auth::user()->photo }}" class="img-fluid circle" alt="" />
                                    @endif
                                </div>
                                {{-- <button class="image-change"><i class="fa-light fa-camera"></i></button> --}}
                            </div>
                            <div class="part-txt">
                                <h4 class="admin-name">{{ Auth::user()->name }}</h4>
                                <span class="admin-role">
                                    @php
                                        if(Auth::user()->is_admin == 1){
                                            echo '<span >Admin</span>';
                                        }
                                        elseif (Auth::user()->is_admin == 2) {
                                            echo '<span >Manager</span>';
                                        }
                                        elseif (Auth::user()->is_admin == 3) {
                                            echo '<span >Project Manager</span>';
                                        }
                                        elseif (Auth::user()->is_admin == 4) {
                                            echo '<span >Managing Director</span>';
                                        }
                                        elseif (Auth::user()->is_admin == 5) {
                                            echo '<span >Chairman</span>';
                                        }
                                        else {
                                            echo '<span >Designer</span>';
                                        }
                                    @endphp
                                </span>
                                <div class="admin-social">
                                    <a href="{{ Auth::user()->facebook }}"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="{{ Auth::user()->twitter }}"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="{{ Auth::user()->linkedin }}"><i class="fa-brands fa-linkedin"></i></a>
                                    <a href="{{ Auth::user()->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="bottom">
                            <h6 class="profile-sidebar-subtitle">Communication Info</h6>
                            <ul>
                                <li><span>Full Name:</span>{{ Auth::user()->name }}</li>
                                <li><span>Mobile:</span>{{ Auth::user()->phone }}</li>
                                <li><span>Mail:</span>{{ Auth::user()->email }}</li>
                                <li><span>Address:</span>{{ Auth::user()->address }}</li>
                                <li><span>Joining Date:</span>{{ Auth::user()->created_at }}</li>
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
                            <button class="btn btn-sm btn-outline-primary" id="nav-change-password-tab" data-bs-toggle="tab" data-bs-target="#nav-change-password" type="button" role="tab" aria-controls="nav-change-password" aria-selected="false">Change Password</button>
                        </div>
                    </nav>
                </div>
                <div class="panel-body">
                    <div class="tab-content profile-edit-tab" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-edit-profile" role="tabpanel" aria-labelledby="nav-edit-profile-tab" tabindex="0">
                            <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="profile-edit-tab-title">
                                    <h6>Private Information</h6>
                                </div>
                                <div class="private-information mb-30">
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-light fa-user"></i></span>
                                                <input type="text" class="form-control" placeholder="Full Name" name="name" value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text"><i class="fa-light fa-user-tie"></i></span>
                                                <select class="form-control select-search" data-placeholder="Role" name="is_admin" value="{{ Auth::user()->is_admin }}">
                                                    <option value="">-- Selected Role --</option>
                                                    <option value="1" {{ Auth::user()->is_admin == 1?'selected':'' }}>Admin</option>
                                                    <option value="2" {{ Auth::user()->is_admin == 2?'selected':'' }}>Manager</option>
                                                    <option value="3" {{ Auth::user()->is_admin == 3?'selected':'' }}>Project Manager</option>
                                                    <option value="4" {{ Auth::user()->is_admin == 4?'selected':'' }}>Managing Director</option>
                                                    <option value="5" {{ Auth::user()->is_admin == 5?'selected':'' }}>Chairman</option>
                                                    <option value="0" {{ Auth::user()->is_admin == 0?'selected':'' }}>Designer</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-4 col-sm-6">
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text"><i class="fa-light fa-circle-check"></i></span>
                                                <select class="form-control" data-placeholder="Status">
                                                    <option value="">Status</option>
                                                    <option value="0" selected>Enable</option>
                                                    <option value="1">Disable</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-4 col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-light fa-envelope"></i></span>
                                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ Auth::user()->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-light fa-phone"></i></span>
                                                <input type="tel" class="form-control" placeholder="Phone" name="phone" value="{{ Auth::user()->phone }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-light fa-image"></i></span>
                                                <input type="file" class="form-control" placeholder="Photo" name="photo" value="{{ Auth::user()->photo }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <textarea class="form-control h-100-p" placeholder="Address" name="address" value="{{ Auth::user()->address }}"></textarea>
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
                                                <input type="url" class="form-control" placeholder="Facebook" name="facebook" value="{{ Auth::user()->facebook }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-brands fa-twitter"></i></span>
                                                <input type="url" class="form-control" placeholder="Twitter" name="twitter" value="{{ Auth::user()->twitter }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-brands fa-linkedin-in"></i></span>
                                                <input type="url" class="form-control" placeholder="Linkedin" name="linkedin" value="{{ Auth::user()->linkedin }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-brands fa-instagram"></i></span>
                                                <input type="url" class="form-control" placeholder="Instagram" name="instagram" value="{{ Auth::user()->instagram }}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-change-password" role="tabpanel" aria-labelledby="nav-change-password-tab" tabindex="0">
                            <form action="{{ route('profile.password', Auth::user()->id) }}" method="POST">
                                @csrf
                                <div class="profile-edit-tab-title">
                                    <h6>Change Password</h6>
                                </div>
                                <div class="social-information">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-light fa-lock"></i></span>
                                                <input type="password" class="form-control" placeholder="Current Password" name="old_password">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-light fa-lock"></i></span>
                                                <input type="password" class="form-control" placeholder="New Password" name="password">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-light fa-lock"></i></span>
                                                <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation ">
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