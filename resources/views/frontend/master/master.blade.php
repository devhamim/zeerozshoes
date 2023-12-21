
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if($setting->first()->title != null)
        <title>{{$setting->first()->title}}</title>
    @endif
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    @if($setting->first()->favicon != null)
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('uploads/setting') }}/{{ $setting->first()->favicon }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('uploads/setting') }}/{{ $setting->first()->favicon }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('uploads/setting') }}/{{ $setting->first()->favicon }}">
        <link rel="manifest" href="{{ asset('uploads/setting') }}/{{ $setting->first()->favicon }}">
        <link rel="mask-icon" href="{{ asset('uploads/setting') }}/{{ $setting->first()->favicon }}" color="#666666">
        <link rel="shortcut icon" href="{{ asset('uploads/setting') }}/{{ $setting->first()->favicon }}">
    @endif
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{asset('frontend/assets/images/icons/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">
    {{-- <link rel="stylesheet" href="assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css"> --}}
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/jquery.countdown.css')}}">
    <!-- Main CSS File -->
    {{-- <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/nouislider/nouislider.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/skins/skin-demo-13.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/demos/demo-13.css')}}">
<!-- Meta Pixel Code -->
@if($setting->first()->fbpixel != null)
    {!! $setting->first()->fbpixel !!}
@endif
{{-- <!-- End Meta Pixel Code --> --}}

<!-- googletag Code -->
@if($setting->first()->googletag != null)
    {!! $setting->first()->googletag !!}
@endif
<!-- End googletag Code -->

</head>

<body>
    <div class="page-wrapper">
        <header class="header header-10 header-intro-clearance">

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="{{ url('/') }}" class="logo">
                            @if($setting->first()->logo != null)
                                <img src="{{ asset('uploads/setting') }}/{{ $setting->first()->logo }}" alt="Molla Logo" width="105" height="25">
                            @endif
                        </a>
                    </div>

                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            {{-- <form action="#" method="get"> --}}
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="search_input" class="sr-only">সার্চ করুন</label>
                                    <input type="search" class="form-control" name="q"  id="search_input" placeholder="সার্চ করুন ..." required value="{{@$_GET['q']}}">
                                    <button id="search_btn" class="btn btn-primary" type="button"><i class="icon-search"></i></button>
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>


                    <div class="header-right">
                        <div class="header-dropdown-link">
                            <div class="dropdown cart-dropdown">

                            </div>


                            <div class="dropdown cart-dropdown">

                                <a href="{{route('checkout')}}" class="dropdown-toggle" style="display: contents">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="cart-txt rounded-circle badge badge-danger text-white">{{ $totalItemsInCart }}</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        @yield('computer')

                    </div>
                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="{{ Request::is('/') ? 'active' : '' }}">
                                    <a href="{{route('site')}}">Home</a>
                                </li>
                                <li class="{{ Request::is('shop') ? 'active' : '' }}">
                                    <a href="{{route('shop')}}">Shop</a>
                                </li>
                                <li class="{{ Request::is('category*') ? 'active' : '' }}">
                                    <a href="{{route('category')}}">Category</a>
                                </li>

                                <li class="{{ Request::is('contact*') ? 'active' : '' }}">
                                    <a href="{{route('contact')}}">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-right text-white">
                        @if($setting->first()->phone != null)
                            <i class="icon-phone"></i>
                            <a href="tel:{{ $setting->first()->phone }}" class="text-white">{{ $setting->first()->phone }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </header>



        <main class="main">
            @yield('content')
        </main>

        <footer class="footer footer-2">
            <div class="footer-middle border-0">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-4">
                            <div class="widget widget-about">
                                @if($setting->first()->logo != null)
                                    <img src="{{ asset('uploads/setting') }}/{{ $setting->first()->logo }}" class="footer-logo" alt="Footer Logo" width="105" height="25">
                                @endif
                                @if($setting->first()->about != null)
                                    <p>{{ $setting->first()->about  }}</p>
                                @endif

                                <!-- End .widget-about-info -->
                            </div><!-- End .widget about-widget -->
                        </div><!-- End .col-sm-12 col-lg-3 -->

                        <div class="col-sm-12 col-xl-8">
                            <div class="row">
                                <div class="col-sm-4 col-lg-4">
                                    <div class="widget">
                                        <h4 class="widget-title">পলিসি</h4>

                                        <ul class="widget-list">
                                            <li><a href="{{ route('contact') }}">আমাদের সম্পর্কে</a></li>
                                            <li><a href="{{ route('privacy.policy') }}">ডেলিভারি পলিসি</a></li>
                                            <li><a href="{{ route('terms') }}">রিটার্ন পলিসি</a></li>
                                            {{-- <li><a href="help.html">Help</a></li> --}}

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4">
                                    <div class="widget">
                                        <h4 class="widget-title">Category</h4>

                                        <ul class="widget-list">
                                            @foreach ($categorys->take(6) as $category)
                                            <li><a href="{{route('category.one', $category->id)}}">{{ $category->category_name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4">
                                    <h4 class="widget-title">Contect</h4>
                                    <div class="info-about-info mt-3">
                                        <div class="info">
                                            <ul class="info-list">
                                                @if($setting->first()->address != null)
                                                    <li><p><i class="icon-map-marker"></i>{{ $setting->first()->address }}</p></li>
                                                @endif
                                                @if($setting->first()->phone != null)
                                                    <li><i class="icon-phone"></i><span>{{ $setting->first()->phone }}</span></li>
                                                @endif
                                                @if($setting->first()->email != null)
                                                    <li><i class="icon-envelope"></i><span>{{ $setting->first()->email }}</span></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div><!-- End .footer-middle -->

            <div class="footer-bottom">
                <div class="container">
                    <p class="footer-copyright align-items-center">
                            @if($setting->first()->footer != null)
                                <span>{{ $setting->first()->footer }} </span>
                            @endif
                             | Design and Development By <a href="https://nugortech.com/">Nugortech it</a>
                    </p><!-- End .footer-copyright -->
                </div>
            </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->


    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container mobile-menu-light">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            {{-- <form action="#" method="get" class="mobile-search"> --}}
                {{-- <label for="mobile-search" class="sr-only">Search</label> --}}
                {{-- <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required> --}}
                {{-- <input type="search" class="form-control" name="q"  id="search_input" placeholder="Search product ..." required value="{{@$_GET['q']}}"> --}}
                {{-- <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button> --}}

                <form action="{{ route('shop') }}" method="get">
                    <label for="search_input" class="sr-only">Search</label>
                    <input type="search" class="form-control" name="q" id="search_input" placeholder="Search product ..." required value="{{ @$_GET['q'] }}">
                    <!-- Add other form input elements (category, color, size, brand, sort) here -->
                    <button id="search_btn" class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                </form>
            {{-- </form> --}}

            <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                    <nav class="mobile-nav">
                        <ul class="mobile-menu">
                            <li class="{{ Request::is('/') ? 'active' : '' }}">
                                <a href="{{route('site')}}">Home</a>
                            </li>
                            <li class="{{ Request::is('shop') ? 'active' : '' }}">
                                <a href="{{route('shop')}}">Shop</a>
                            </li>
                            <li class="{{ Request::is('category*') ? 'active' : '' }}">
                                <a href="{{route('category')}}">Category</a>
                            </li>
                            <li class="{{ Request::is('offer*') ? 'active' : '' }}">
                                <a href="{{route('offer')}}">Offer</a>
                            </li>
                            <li class="{{ Request::is('campaign*') ? 'active' : '' }}">
                                <a href="{{route('campaign')}}">Campaign</a>
                            </li>
                            <li class="{{ Request::is('contact*') ? 'active' : '' }}">
                                <a href="{{route('contact')}}">Contact</a>
                            </li>
                        </ul>
                    </nav><!-- End .mobile-nav -->
                </div>
                <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                    <nav class="mobile-cats-nav">
                        @yield('mobile')
                    </nav>
                </div>
            </div><!-- End .tab-content -->

        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- Plugins JS File -->
    <script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/superfish.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.elevateZoom.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.plugin.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.countdown.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    {{-- <script src="{{asset('frontend/js/wNumb.js')}}"></script> --}}
    {{-- <script src="{{asset('frontend/js/nouislider.min.js')}}"></script> --}}
    {{-- <script src="{{asset('frontend/assets/js/wNumb.js')}}"></script> --}}
    {{-- <script src="{{asset('frontend/assets/js/nouislider.min.js')}}"></script> --}}

    <!-- Main JS File -->
    <script src="{{asset('frontend/assets/js/demos/demo-13.js')}}"></script>
    <script src="{{asset('frontend/assets/js/main.js')}}"></script>



    @yield('footer_script')

    @if (session('success'))
        {
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                customClass: 'swal-height',
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}',
            })
        </script>
        }
    @endif
    @if (session('error'))
        {
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                customClass: 'swal-height',
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}',
            })
        </script>
        }
    @endif

    {{-- product quick view --}}
        {{-- <script>
            $(document).on('click', '.btn-quickview', function(e) {
                var id = $(this).attr("id");
                $.ajax({
                    url: "{{url("/product-quick-view")}}/"+id,
                    type: 'get',
                    success: function(data) {
                        $(".quickView-container").html(data);
                    }
                })
            })
        </script> --}}

        {{-- <script>
            $('.color_control').change(function(e) {
                e.preventDefault();
                var color_id = $(this).val();
                var product_id = '{{$product->id}}';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/get_size',
                    type: 'POST',
                    data: {
                        'color_id': color_id,
                        'product_id': product_id
                    },
                    success: function(data) {
                        $('#size_Id').html(data)
                    }
                })
            })
        </script> --}}

        {{-- <script>
            $(document).ready(function () {
            cartload();
        });

        function cartload()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/load-cart-data',
                method: "GET",
                success: function (response) {
                    $('.basket-item-count').html('');
                    var parsed = jQuery.parseJSON(response)
                    var value = parsed; //Single Data Viewing
                    $('.basket-item-count').append($('<span class=".cart">'+ value['totalcart'] +'</span>'));
                }
            });
        }

        </script> --}}

        <script>
            // Add to cart
            $(document).ready(function () {
                $('.add-to-cart-btn').click(function (e) {
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var product_id = $(this).closest('.product_data').find('.product_id').val();
                    var size = $(this).closest('.product_data').find('.size_id').val();
                    var color = $(this).closest('.product_data').find('.color_id').val();
                    var quantity = $(this).closest('.product_data').find('.qty-input').val();

                    $.ajax({
                        url: "/add-to-cart",
                        method: "POST",
                        data: {
                            'quantity': quantity,
                            'product_id': product_id,
                            'color_id': color,
                            'size_id': size,
                        },
                        success: function (response) {
                            alertify.set('notifier','position','top-right');
                            alertify.success(response.status);
                            cartload();
                            $('#load').load(location.href + ' .counted');
                        },
                    });
                });
            });
        </script>

<script>
    // Update Cart Data
    $(document).ready(function () {

    $('.changeQuantity').click(function (e) {
        e.preventDefault();
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        var thisClick = $(this);
        var quantity = $(this).closest(".cartpage").find('.qty-input').val();
        var product_id = $(this).closest(".cartpage").find('.product_id').val();
        var color_id = $(this).closest(".cartpage").find('.color_id').val();
        var size_id = $(this).closest(".cartpage").find('.size_id').val();
        var data = {
            '_token': $('input[name=_token]').val(),
            'quantity':quantity,
            'product_id':product_id,
            'color_id':color_id,
            'size_id':size_id,
        };

        $.ajax({
            url: '/update-to-cart',
            type: 'POST',
            data: data,
            success: function (response) {
                // window.location.reload();
                thisClick.closest(".cartpage").find('.total-col').text(response.gtprice)
                $('#totalajaxcall').load(location.href + ' .totalpricingload');
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
            }
        });
    });

});
</script>

<script>
    // Delete Cart Data
    $(document).ready(function () {

    $('.delete_cart_data').click(function (e) {
        e.preventDefault();

        var thisDeletearea = $(this);

        var product_id = $(this).closest(".cartpage").find('.product_id').val();

        var data = {
            '_token': $('input[name=_token]').val(),
            "product_id": product_id,
        };

        $(this).closest(".cartpage").remove();

        $.ajax({
            url: '/delete-from-cart',
            type: 'DELETE',
            data: data,
            success: function (response) {
                // window.location.reload();
                // thisDeletearea.closest(".cartpage")->remove();
                $('#totalajaxcall').load(location.href + ' .totalpricingload');
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
            }
        });
    });

});
</script>

<script>
    // Clear Cart Data
    $(document).ready(function () {

        $('.clear_cart').click(function (e) {
            e.preventDefault();

            $.ajax({
                url: '/clear-cart',
                type: 'GET',
                success: function (response) {
                    window.location.reload();
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                }
            });

        });

    });
</script>

<script>
    $(document).ready(function() {
        $('.add_to_cart').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var product_id = $(this).closest(".cartpage").find('.product_id_value').val();
            // alert(product_id);
            $.ajax({
                url: '/add_single_cart',
                type: 'POST',
                data: {
                    'product_id': product_id,
                },
                success: function (response) {
                    if(response.error_status == 'error') {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(response.status);
                    } else {
                        alertify.set('notifier','position','top-right');
                        alertify.success(response.status);
                        cartload();
                        $('#load').load(location.href + ' .counted');
                    }
                }
            })
        })
    })
</script>

<script>
    // cart store
    function addtocart() {
        // var product_id = $(this).closest(".product_data").find('.product_id').val();
        // alert(product_id);
        var product_id = $('.product_id').val();
        var color_id = $('.color_id').val();
        var size_id = $('.size_id').val();
        var quantity = $('.qty-input').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/quick-to-cart",
            method: "POST",
            data: {
                'quantity': quantity,
                'product_id': product_id,
                'color_id': color_id,
                'size_id': size_id,
            },
            success: function(response) {
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
                cartload();
                $('#load').load(location.href + ' .counted');
            }
        });
    }
</script>

<script>
    $(document).ready(function() {
        $('.add_to_wishlist').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var product_id = $(this).closest(".cartpage").find('.product_id_value').val();
            $.ajax({
                url: '/add-wishlist',
                type: 'POST',
                data: {
                    'product_id': product_id,
                },
                success: function (response) {
                    // if(response.error_status == 'error') {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(response.status);
                    // } else {
                    //     alertify.set('notifier','position','top-right');
                    //     alertify.success(response.status);
                    //     cartload();
                    //     $('#load').load(location.href + ' .counted');
                    // }
                }
            })
        })
    })
</script>

<script>
    $('#search_btn').click(function() {
    var search_input = $('#search_input').val();
    var category_id = $('input[class="category_id"]:checked').attr('value');
    var color_id = $('input[class="color_id"]:checked').attr('value');
    var size_id = $('input[class="size_id"]:checked').attr('value');
    var brand_id = $('input[class="brand_id"]:checked').attr('value');
    var sort = $('#sort').val();
    var link = "{{ route('shop') }}" + "?q=" + search_input + "&category_id=" + category_id + "&color_id=" + color_id + "&size_id=" + size_id + "&brand_id=" + brand_id + "&sort=" + sort;
    window.location.href = link;
});
    $('#search_btn').click(function(){
        var search_input = $('#search_input').val();
        var category_id = $('input[class="category_id"]:checked').attr('value');
        var color_id = $('input[class="color_id"]:checked').attr('value');
        var size_id = $('input[class="size_id"]:checked').attr('value');
        var brand_id = $('input[class="brand_id"]:checked').attr('value');
        var sort = $('#sort').val();
        var link = "{{route('shop')}}" + "?q=" + search_input + "&category_id=" + category_id + "&color_id=" + color_id + "&size_id=" + size_id + "&brand_id=" + brand_id + "&sort="+sort;
        window.location.href = link;
	})
    $('.category_id').click(function() {
        var search_input = $('#search_input').val();
        var category_id = $('input[class="category_id"]:checked').attr('value');
        var color_id = $('input[class="color_id"]:checked').attr('value');
        var size_id = $('input[class="size_id"]:checked').attr('value');
        var brand_id = $('input[class="brand_id"]:checked').attr('value');
        var sort = $('#sort').val();
        var link = "{{route('shop')}}" + "?q=" + search_input + "&category_id=" + category_id + "&color_id=" + color_id + "&size_id=" + size_id + "&brand_id=" + brand_id + "&sort="+sort;
        window.location.href = link;
    })
    $('.color_id').click(function() {
        var search_input = $('#search_input').val();
        var category_id = $('input[class="category_id"]:checked').attr('value');
        var color_id = $('input[class="color_id"]:checked').attr('value');
        var size_id = $('input[class="size_id"]:checked').attr('value');
        var brand_id = $('input[class="brand_id"]:checked').attr('value');
        var sort = $('#sort').val();
        var link = "{{route('shop')}}" + "?q=" + search_input + "&category_id=" + category_id + "&color_id=" + color_id + "&size_id=" + size_id + "&brand_id=" + brand_id + "&sort="+sort;
        window.location.href = link;
    })
    $('.size_id').click(function() {
        var search_input = $('#search_input').val();
        var category_id = $('input[class="category_id"]:checked').attr('value');
        var color_id = $('input[class="color_id"]:checked').attr('value');
        var size_id = $('input[class="size_id"]:checked').attr('value');
        var brand_id = $('input[class="brand_id"]:checked').attr('value');
        var sort = $('#sort').val();
        var link = "{{route('shop')}}" + "?q=" + search_input + "&category_id=" + category_id + "&color_id=" + color_id + "&size_id=" + size_id + "&brand_id=" + brand_id + "&sort="+sort;
        window.location.href = link;
    })
    $('.brand_id').click(function() {
        var search_input = $('#search_input').val();
        var category_id = $('input[class="category_id"]:checked').attr('value');
        var color_id = $('input[class="color_id"]:checked').attr('value');
        var size_id = $('input[class="size_id"]:checked').attr('value');
        var brand_id = $('input[class="brand_id"]:checked').attr('value');
        var sort = $('#sort').val();
        var link = "{{route('shop')}}" + "?q=" + search_input + "&category_id=" + category_id + "&color_id=" + color_id + "&size_id=" + size_id + "&brand_id=" + brand_id + "&sort="+sort;
        window.location.href = link;
    })
    $('#sort').change(function() {
        var search_input = $('#search_input').val();
        var category_id = $('input[class="category_id"]:checked').attr('value');
        var color_id = $('input[class="color_id"]:checked').attr('value');
        var size_id = $('input[class="size_id"]:checked').attr('value');
        var brand_id = $('input[class="brand_id"]:checked').attr('value');
        var sort = $('#sort').val();
        var link = "{{route('shop')}}" + "?q=" + search_input + "&category_id=" + category_id + "&color_id=" + color_id + "&size_id=" + size_id + "&brand_id=" + brand_id + "&sort="+sort;
        window.location.href = link;
    })
</script>




{{-- <script>
    function changecolor() {
        var color_id = $('.color_id option:selected').val();
        var productt_id = '{{$product->id}}';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/quick_get_size',
            type: 'POST',
            data: {
                'color_id': color_id,
                'product_id': productt_id
            },
            success: function(data) {
                alert(data);
                console.log(data);
            }
        })
    }
</script> --}}
</body>


<!-- molla/index-13.html  22 Nov 2019 09:59:31 GMT -->
</html>
