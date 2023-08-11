
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Footcap</title>

  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="{{ asset('uplode/logo') }}/{{ $settings->first()->logo }}" type="image/svg+xml">

    {{-- km --}}
    <link href="{{ asset('frontend') }}/assets/css/styles.css" rel="stylesheet">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css">



  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
    rel="stylesheet">

  <!--
    - preload banner
  -->
  <link rel="preload" href="{{ asset('frontend') }}/assets/images/hero-banner.png" as="image">

  <style>
    ::-webkit-input-placeholder {
      font-size: 16px;
    }
    input[type=text] {
      font-size: 16px;
    }
    input[type=email] {
      font-size: 16px;
    }
    input[type=password] {
      font-size: 16px;
    }

  </style>

</head>

<body id="top">

  <!--
    - #HEADER
  -->

  @include('frontend.layouts.header')

{{-- main --}}
@yield('content')


  <!--
    - #FOOTER
  -->

@include('frontend.layouts.footer')
  <!--
    - #GO TO TOP
  -->

  <a href="#top" class="go-top-btn" data-go-top>
    <ion-icon name="arrow-up-outline"></ion-icon>
  </a>


  {{-- jquery --}}
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  {{-- <script src="assets/js/jquery.min.js"></script> --}}
  <script src="{{ asset('frontend/assets/js/mixitup.min.js') }}"></script>



		<script src="{{ asset('frontend') }}/assets/js/popper.min.js"></script>
		<script src="{{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>
		<script src="{{ asset('frontend') }}/assets/js/ion.rangeSlider.min.js"></script>
		<script src="{{ asset('frontend') }}/assets/js/slick.js"></script>
		<script src="{{ asset('frontend') }}/assets/js/slider-bg.js"></script>
		{{-- <script src="{{ asset('frontend') }}/assets/js/lightbox.js"></script>  --}}
		<script src="{{ asset('frontend') }}/assets/js/smoothproducts.js"></script>
		<script src="{{ asset('frontend') }}/assets/js/snackbar.min.js"></script>
		<script src="{{ asset('frontend') }}/assets/js/jQuery.style.switcher.js"></script>
		<script src="{{ asset('frontend') }}/assets/js/custom.js"></script>
  <!--
    - custom js link
  -->
  <script src="{{ asset('frontend') }}/assets/js/script.js"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  @yield('footer_script')

  <script>
    function openWishlist() {
      document.getElementById("Wishlist").style.display = "block";
    }
    function closeWishlist() {
      document.getElementById("Wishlist").style.display = "none";
    }
  </script>

  <script>
    function openCart() {
      document.getElementById("Cart").style.display = "block";
    }
    function closeCart() {
      document.getElementById("Cart").style.display = "none";
    }
  </script>

  <script>
    function openSearch() {
      document.getElementById("Search").style.display = "block";
    }
    function closeSearch() {
      document.getElementById("Search").style.display = "none";
    }
  </script>

@include('sweetalert::alert')

<script>
   $('#search_btn').click(function(){
        var search_input = $('#search_input').val();
        var category_id = $('input[class="category_id"]:checked').val();
        var brand_id = $('input[class="brand_id"]:checked').val();
        var color_id = $('input[class="color_idd"]:checked').val();
        var size_id = $('input[class="size_idd"]:checked').val();
        var min = $('#min').val();
        var max = $('#max').val();
        var sort = $('#sort').val();


        var link = "{{ route('shop') }}"+"?q="+search_input+"&category_id="+category_id+"&color_id="+color_id+"&size_id="+size_id+"&min="+min+"&max="+max+"&sort="+sort+"&brand_id="+brand_id;
        window.location.href = link;
    });
    $('#sort_price').click(function(){
        var search_input = $('#search_input').val();
        var category_id = $('input[class="category_id"]:checked').val();
        var brand_id = $('input[class="brand_id"]:checked').val();
        var color_id = $('input[class="color_idd"]:checked').val();
        var size_id = $('input[class="size_idd"]:checked').val();
        var min = $('#min').val();
        var max = $('#max').val();
        var sort = $('#sort').val();


        var link = "{{ route('shop') }}"+"?q="+search_input+"&category_id="+category_id+"&color_id="+color_id+"&size_id="+size_id+"&min="+min+"&max="+max+"&sort="+sort+"&brand_id="+brand_id;
        window.location.href = link;
    });
    $('.category_id').click(function(){

        var search_input = $('#search_input').val();
        var category_id = $('input[class="category_id"]:checked').val();
        var brand_id = $('input[class="brand_id"]:checked').val();
        var color_id = $('input[class="color_idd"]:checked').val();
        var size_id = $('input[class="size_idd"]:checked').val();
        var min = $('#min').val();
        var max = $('#max').val();
        var sort = $('#sort').val();


        var link = "{{ route('shop') }}"+"?q="+search_input+"&category_id="+category_id+"&color_id="+color_id+"&size_id="+size_id+"&min="+min+"&max="+max+"&sort="+sort+"&brand_id="+brand_id;
        window.location.href = link;
    });

    $('.brand_id').click(function(){
        var search_input = $('#search_input').val();
        var category_id = $('input[class="category_id"]:checked').val();
        var brand_id = $('input[class="brand_id"]:checked').val();
        var color_id = $('input[class="color_idd"]:checked').val();
        var size_id = $('input[class="size_idd"]:checked').val();
        var min = $('#min').val();
        var max = $('#max').val();
        var sort = $('#sort').val();


        var link = "{{ route('shop') }}"+"?q="+search_input+"&category_id="+category_id+"&color_id="+color_id+"&size_id="+size_id+"&min="+min+"&max="+max+"&sort="+sort+"&brand_id="+brand_id;
        window.location.href = link;
    });

    $('.color_idd').click(function(){
        var search_input = $('#search_input').val();
        var category_id = $('input[class="category_id"]:checked').val();
        var brand_id = $('input[class="brand_id"]:checked').val();
        var color_id = $('input[class="color_idd"]:checked').val();
        var size_id = $('input[class="size_idd"]:checked').val();
        var min = $('#min').val();
        var max = $('#max').val();
        var sort = $('#sort').val();


        var link = "{{ route('shop') }}"+"?q="+search_input+"&category_id="+category_id+"&color_id="+color_id+"&size_id="+size_id+"&min="+min+"&max="+max+"&sort="+sort+"&brand_id="+brand_id;
        window.location.href = link;
    });
    $('.size_idd').click(function(){
        var search_input = $('#search_input').val();
        var category_id = $('input[class="category_id"]:checked').val();
        var brand_id = $('input[class="brand_id"]:checked').val();
        var color_id = $('input[class="color_idd"]:checked').val();
        var size_id = $('input[class="size_idd"]:checked').val();
        var min = $('#min').val();
        var max = $('#max').val();
        var sort = $('#sort').val();


        var link = "{{ route('shop') }}"+"?q="+search_input+"&category_id="+category_id+"&color_id="+color_id+"&size_id="+size_id+"&min="+min+"&max="+max+"&sort="+sort+"&brand_id="+brand_id;
        window.location.href = link;
    });

    $('#sort').change(function(){
        var search_input = $('#search_input').val();
        var category_id = $('input[class="category_id"]:checked').val();
        var brand_id = $('input[class="brand_id"]:checked').val();
        var color_id = $('input[class="color_idd"]:checked').val();
        var size_id = $('input[class="size_idd"]:checked').val();
        var min = $('#min').val();
        var max = $('#max').val();
        var sort = $('#sort').val();


        var link = "{{ route('shop') }}"+"?q="+search_input+"&category_id="+category_id+"&color_id="+color_id+"&size_id="+size_id+"&min="+min+"&max="+max+"&sort="+sort+"&brand_id="+brand_id;
        window.location.href = link;
    });
</script>
</body>

</html>
