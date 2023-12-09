
<!DOCTYPE html>
<html lang="en" class="default-style layout-fixed layout-navbar-fixed">
<head>
    @if($setting->first()->title != null)
        <title>{{$setting->first()->title}}</title>
    @endif
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Empire is one of the unique admin template built on top of Bootstrap 4 framework. It is easy to customize, flexible code styles, well tested, modern & responsive are the topmost key factors of Empire Dashboard Template" />
    <meta name="keywords" content="bootstrap admin template, dashboard template, backend panel, bootstrap 4, backend template, dashboard template, saas admin, CRM dashboard, dashboard">
    <meta name="author" content="Codedthemes" />
    @if($setting->first()->favicon != null)
        <link rel="icon" type="image/x-icon" href="{{ asset('uploads/setting') }}/{{ $setting->first()->favicon }}">
    @endif

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="{{asset('backend/fonts/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('backend/fonts/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/fonts/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/fonts/open-iconic.css')}}">
    <link rel="stylesheet" href="{{asset('backend/fonts/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{asset('backend/fonts/feather.css')}}">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap-material.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/shreerang-material.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/uikit.css')}}">

    <!-- Libs -->
    <link rel="stylesheet" href="{{asset('backend/libs/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('backend/libs/flot/flot.css')}}">
    <link rel="stylesheet" href="{{asset('backend/libs/datatables/datatables.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/pages/users.css')}}">
    <link rel="stylesheet" href="{{asset('backend/libs/bootstrap-sweetalert/bootstrap-sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('backend/libs/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('backend/libs/select2/select2.css')}}">
    <link rel="stylesheet" href="{{asset('backend/libs/bootstrap-datepicker/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('backend/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('backend/libs/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.css')}}">
    <link rel="stylesheet" href="{{asset('backend/libs/timepicker/timepicker.css')}}">
    <link rel="stylesheet" href="{{asset('backend/libs/minicolors/minicolors.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <style>
        .sidenav-item a{
            color: #fff;
        }
        .form-control {
            border: 1px solid #8897AA !important;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <!-- [ Layout sidenav ] Start -->
            <div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical logo-dark" style="background: #0e0c28">
                <!-- Brand demo (see assets/css/demo/demo.css) -->
                <div class="app-brand demo bg-white" style="height: 80px">
                    <a href="{{route('site')}}" target="_" class="app-brand-text demo sidenav-text font-weight-normal ml-2">
                        <span class="app-brand-logo demo">
                            @if($setting->first()->logo != null)
                                <img src="{{ asset('uploads/setting') }}/{{ $setting->first()->logo }}" alt="Brand Logo" class="img-fluid">
                            @endif
                        </span>
                    </a>
                    <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
                        <i class="ion ion-md-menu align-middle"></i>
                    </a>
                </div>
                <div class="sidenav-divider mt-0"></div>

                <!-- Links -->
                <ul class="sidenav-inner py-1">

                    <li class="sidenav-item {{ Request::is('home') ? 'active open' : '' }}">
                        <a href="{{route('home')}}" class="sidenav-link">
                            <i class="sidenav-icon feather icon-home"></i>
                            <div>Dashboard</div>
                        </a>
                    </li>
                    <li class="sidenav-item">
                        <a href="{{route('customer.list')}}" class="sidenav-link">
                            <i class="sidenav-icon feather icon-user"></i>
                            <div>Customer</div>
                        </a>
                    </li>
                    <li class="sidenav-item {{ Request::is('orders/list') ? 'active' : '' }}">
                        <a href="{{route('orders.list')}}" class="sidenav-link">
                            <i class="sidenav-icon ion ion-md-basket"></i>
                            <div>Order</div>
                        </a>
                    </li>
                    <li class="sidenav-item {{ Request::is('product/list') ? 'active' : '' }}">
                        <a href="{{route('product.list')}}" class="sidenav-link">
                            <i class="sidenav-icon lnr lnr-coffee-cup"></i>
                            <div>Product</div>
                        </a>
                    </li>
                    <li class="sidenav-item {{ Request::is('category/list') ? 'active' : '' }}">
                        <a href="{{route('category.list')}}" class="sidenav-link">
                            <i class="sidenav-icon feather icon-grid"></i>
                            <div>Category</div>
                        </a>
                    </li>
                    <li class="sidenav-item {{ Request::is('banner/list') ? 'active' : '' }}">
                        <a href="{{route('banner.list')}}" class="sidenav-link">
                            <i class="sidenav-icon lnr lnr-picture"></i>
                            <div>Sliders</div>
                        </a>
                    </li>
                    <li class="sidenav-item {{ Request::is('media/list') ? 'active' : '' }}">
                        <a href="{{route('media.list')}}" class="sidenav-link">
                            <i class="sidenav-icon lnr lnr-picture"></i>
                            <div>Media</div>
                        </a>
                    </li>
                    <li class="sidenav-item {{ Request::is('courier*', 'city*', 'zone*') ? 'active open' : '' }}">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon lnr lnr-car"></i>
                            <div>Courier</div>
                        </a>
                        <ul class="sidenav-menu {{ Request::is('courier/list') ? 'active' : '' }}">
                            <li class="sidenav-item">
                                <a href="{{route('courier.list')}}" class="sidenav-link">
                                    <div>Courier</div>
                                </a>
                            </li>
                            <li class="sidenav-item {{ Request::is('city/list') ? 'active' : '' }}">
                                <a href="{{route('city.list')}}" class="sidenav-link">
                                    <div>City</div>
                                </a>
                            </li>
                            <li class="sidenav-item {{ Request::is('zone/list') ? 'active' : '' }}">
                                <a href="{{route('zone.list')}}" class="sidenav-link">
                                    <div>Zone</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidenav-item {{ Request::is('shipping.methods') ? 'active' : '' }}">
                        <a href="{{route('shipping.methods')}}" class="sidenav-link">
                            <i class="sidenav-icon lnr lnr-coffee-cup"></i>
                            <div>Shipping Methods</div>
                        </a>
                    </li>
                    <li class="sidenav-item {{ Request::is('user/list') ? 'active' : '' }}" >
                        <a href="{{route('users')}}" class="sidenav-link">
                            <i class="sidenav-icon feather icon-users"></i>
                            <div>Users</div>
                        </a>
                    </li>
                    <li class="sidenav-item {{ Request::is('contact/info') ? 'active' : '' }}">
                        <a href="{{route('contact.list')}}" class="sidenav-link">
                            <i class="sidenav-icon lnr lnr-license"></i>
                            <div>Messages</div>
                        </a>
                    </li>
                    <li class="sidenav-item {{ Request::is('terms*', 'setting*') ? 'active open' : '' }}">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon lnr lnr-license"></i>
                            <div>Terms & Policy</div>
                        </a>
                        <ul class="sidenav-menu {{ Request::is('terms/policy') ? 'active' : '' }}">
                            <li class="sidenav-item {{ Request::is('terms/condition') ? 'active' : '' }}">
                                <a href="{{route('terms.condition')}}" class="sidenav-link">
                                    <div>Return Policy</div>
                                </a>
                            </li>
                            <li class="sidenav-item {{ Request::is('privacy/policy') ? 'active' : '' }}">
                                <a href="{{route('terms.privacy.policy')}}" class="sidenav-link">
                                    <div>Delivery Policy</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="{{ route('setting.add') }}" class="sidenav-link">
                                    <div>Setting</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- [ Layout sidenav ] End -->
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
                <!-- [ Layout navbar ( Header ) ] Start -->
                <nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-white container-p-x" id="layout-navbar">

                    <!-- Brand demo (see assets/css/demo/demo.css) -->
                    <a href="{{ route('site') }}" class="navbar-brand app-brand demo bg-white d-lg-none py-0 mr-4">
                        <span class="app-brand-logo demo">
                            @if($setting->first()->logo != null)
                                <img src="{{ asset('uploads/setting') }}/{{ $setting->first()->logo }}" alt="Brand Logo" class="img-fluid">
                            @endif
                        </span>
                    </a>

                    <!-- Sidenav toggle (see assets/css/demo/demo.css) -->
                    <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto">
                        <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:">
                            <i class="ion ion-md-menu text-large align-middle"></i>
                        </a>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="navbar-collapse collapse" id="layout-navbar-collapse">
                        <!-- Divider -->
                        <hr class="d-lg-none w-100 my-2">

                        <div class="navbar-nav align-items-lg-center">
                            <!-- Search -->

                        </div>

                        <div class="navbar-nav align-items-lg-center ml-auto">


                            <div class="demo-navbar-messages nav-item dropdown mr-lg-3">
                                <a class="nav-link dropdown-toggle hide-arrow" href="#" data-toggle="dropdown">
                                    <i class="feather icon-mail navbar-icon align-middle"></i>
                                    <span class="badge badge-success badge-dot indicator"></span>
                                    <span class="d-lg-none align-middle">&nbsp; Messages</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="bg-primary text-center text-white font-weight-bold p-3">
                                        {{App\Models\Contact::where('status', '0')->count()}} New Messages
                                    </div>
                                    <div class="list-group list-group-flush">
                                        @foreach (App\Models\Contact::latest()->take(5)->get() as $contact)


                                        <a href="{{route('contact.list')}}" class="list-group-item list-group-item-action media d-flex align-items-center"  style="background:{{$contact->status == 0 ? 'rgba(96, 108, 114, 0.1)': 'r'}}">
                                            {{-- <img src="assets/img/avatars/6-small.png" class="d-block ui-w-40 rounded-circle" alt> --}}
                                            <div class="media-body ml-3">
                                                <div class="text-dark line-height-condenced">{{$contact->message}}</div>
                                                <div class="text-light small mt-1">
                                                    {{$contact->name}} &nbsp;·&nbsp; {{ $contact->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>

                                    <a href="{{route('contact.list')}}" class="d-block text-center text-light small p-2 my-1">Show all messages</a>
                                </div>
                            </div>

                            <!-- Divider -->
                            <div class="nav-item d-none d-lg-block text-big font-weight-light line-height-1 opacity-25 mr-3 ml-1">|</div>
                            <div class="demo-navbar-user nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                    <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">

                                        @if (Auth::user()->image == null)
                                            <img src="{{Avatar::create(Auth::user()->name)->toBase64()}}" class="img-fluid img-radius wid-40" alt="">
                                        @else
                                            <img src="{{asset('uploads/user')}}/{{Auth::user()->image}}" alt class="d-block ui-w-30 rounded-circle">
                                        @endif
                                        <span class="px-1 mr-lg-2 ml-2 ml-lg-0">{{Auth::user()->name}}</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('profile')}}" class="dropdown-item">
                                        {{-- <i class="feather icon-user text-muted"></i> &nbsp; Account settings</a> --}}
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                                        <i class="feather icon-power text-danger"></i> &nbsp; Log Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- [ Layout navbar ( Header ) ] End -->

                <!-- [ Layout content ] Start -->
                <div class="layout-content">

                    <!-- [ content ] Start -->
                    @yield('content')

                </div>

            </div>
            <!-- [ Layout container ] End -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-sidenav-toggle"></div>
    </div>
    <!-- [ Layout wrapper] End -->

    <!-- Core scripts -->
    <script src="{{asset('backend/js/pace.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{asset('backend/libs/popper/popper.js')}}"></script> --}}
    {{-- <script src="{{asset('backend/js/bootstrap.js')}}"></script> --}}
    <script src="{{asset('backend/js/sidenav.js')}}"></script>
    <script src="{{asset('backend/js/layout-helpers.js')}}"></script>
    <script src="{{asset('backend/js/material-ripple.js')}}"></script>

    <!-- Libs -->
    <script src="{{asset('backend/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('backend/libs/eve/eve.js')}}"></script>
    <script src="{{asset('backend/libs/flot/flot.js')}}"></script>
    <script src="{{asset('backend/libs/flot/curvedLines.js')}}"></script>
    <script src="{{asset('backend/libs/chart-am4/core.js')}}"></script>
    <script src="{{asset('backend/libs/chart-am4/charts.js')}}"></script>
    <script src="{{asset('backend/libs/chart-am4/animated.js')}}"></script>
    <script src="{{asset('backend/libs/raphael/raphael.js')}}"></script>
    <script src="{{asset('backend/libs/morris/morris.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('backend/libs/moment/moment.js')}}"></script>
    <script src="{{asset('backend/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js')}}"></script>
    <script src="{{asset('backend/libs/datatables/datatables.js')}}"></script>
    <script src="{{asset('backend/libs/bootbox/bootbox.js')}}"></script>
    <script src="{{asset('backend/libs/select2/select2.js')}}"></script>
    <script src="{{asset('backend/js/pages/forms_selects.js')}}"></script>
    <script src="{{asset('backend/libs/bootstrap-sweetalert/bootstrap-sweetalert.js')}}"></script>
    <script src="{{asset('backend/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('backend/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js')}}"></script>
    <script src="{{asset('backend/libs/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.js')}}"></script>
    <script src="{{asset('backend/libs/timepicker/timepicker.js')}}"></script>
    <script src="{{asset('backend/libs/minicolors/minicolors.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>



    @yield('footer_script')
    @if(session('success')) {
    <script>

            const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: '{{ session('success' )}}'
        })
        </script>
    }
    @endif
    @if(session('error')) {
    <script>

            const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'error',
        title: '{{ session('error' )}}'
        })
        </script>
    }
    @endif

    <!-- Demo -->
    {{-- <script src="{{asset('backend/js/demo.js"></script> --}}
    <script src="{{asset('backend/js/analytics.js')}}"></script>
    {{-- <script src="{{asset('backend/js/pages/dashboards_ecommerce.js')}}"></script> --}}
    <script src="{{asset('backend/js/demo.js')}}"></script>
    <script src="{{asset('backend/js/pages/ui_modals.js')}}"></script>
    <script src="{{asset('backend/js/pages/forms_pickers.js')}}"></script>

    <script>
        // DataTable start
        $('#report-table').DataTable();
        // DataTable end
    </script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                tabsize: 2,
                height: 200
            });
        });
    </script>


    </body>

</html>
