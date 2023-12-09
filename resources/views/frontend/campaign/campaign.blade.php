@extends('frontend.master.master')
@section('computer')
<div class="dropdown category-dropdown show is-on" data-visible="false">
    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
        ক্যাটেগরীজ
    </a>
    <div class="dropdown-menu">
        <nav class="side-nav">
            <ul class="menu-vertical sf-arrows">
                @foreach ($categories->slice(0, 10) as $category)
                    <li><a href="{{route('category.one',$category->id)}}">{{$category->category_name}}</a></li>
                @endforeach
                <li><a href="{{route('category')}}">All</a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="intro-slider-container intro-slider-container-custom mb-3">
    <div class="intro-slider intro-slider-custom owl-carousel owl-theme owl-nav-inside owl-light mb-0" data-toggle="owl" data-owl-options='{
            "dots": true,
            "nav": false, 
            "responsive": {
                "1200": {
                    "nav": true,
                    "dots": false
                }
            }
        }'>
        <div class="intro-slide intro-slide-custom" style="background-image: url({{asset('frontend/assets/images/demos/demo-8/slider/slide-1.jpg')}}); background-repeat: no-repeat; background-position: top left;">
            <div class="container intro-content intro-content-custom text-left">
                <h3 class="intro-subtitle intro-subtitle-custom">Limited time only *</h3><!-- End .h3 intro-subtitle -->
                <h1 class="intro-title intro-title-custom">Summer<br><strong>sale</strong></h1><!-- End .intro-title -->
                <h3 class="intro-subtitle intro-subtitle-custom">Up to 50% off</h3><!-- End .h3 intro-subtitle -->
                <a href="#" class="btn">
                    @if ($products != '' && $products->first() != null)
                    <span class="campaign-countdown offer-countdown" data-until="+{{Carbon\Carbon::now()->diffInHours($products->first()->validity, false)}}h"></span>
                    @else
                    <span class="campaign-countdown offer-countdown" data-until=""></span>
                    @endif
                </a>
            </div><!-- End .intro-content -->
            <img class="position-right" src="{{asset('frontend/assets/images/demos/demo-8/slider/img-1.png')}}">
        </div><!-- End .intro-slide -->

        <div class="intro-slide intro-slide-custom" style="background-image: url({{asset('frontend/assets/images/demos/demo-8/slider/slide-2.jpg')}});">
            <div class="container intro-content intro-content-custom  text-right">
                <h3 class="intro-subtitle intro-subtitle-custom">PREMIUM QUALITY</h3><!-- End .h3 intro-subtitle -->
                <!-- <h1 class="intro-title intro-title-custom">coats <span class="highlight">&</span><br>jackets</h1> -->
                <h1 class="intro-title intro-title-custom">Summer<br><strong>sale</strong></h1>

                <a href="#" class="btn">
                    @if ($products != '' && $products->first() != null)
                    <span class="campaign-countdown offer-countdown" data-until="+{{Carbon\Carbon::now()->diffInHours($products->first()->validity, false)}}h"></span>
                    @else
                    <span class="campaign-countdown offer-countdown" data-until=""></span>
                    @endif
                </a>
            </div><!-- End .intro-content -->
            <img class="position-left" src="{{asset('frontend/assets/images/demos/demo-8/slider/img-2.png')}}">
        </div><!-- End .intro-slide -->
    </div><!-- End .intro-slider owl-carousel owl-simple -->

    <span class="slider-loader"></span><!-- End .slider-loader -->
</div>

<div class="container new-arrivals">

    <div class="heading heading-flex heading-border">
        <div class="heading-left mb-1">
            <h2 class="title">All Product</h2>
        </div>

       <!-- <div class="heading-right">
            <a href="" class="see_more"><h3 class="me-1">See More</h3><span>></span></a>
       </div> -->
    </div>

    

    <div class="tab-content tab-content-carousel">
        <div class="tab-pane p-0 fade show active" id="arrivals-all-tab" role="tabpanel" aria-labelledby="arrivals-all-link">
            <div class="row justify-content-center">
                @foreach ($products as $product)
                <div class="col-lg-3 col-10 col-md-4  cartpage col-none">
                    <div class="product">
                        <figure class="product-media">
                            <a href="{{route('product.details', $product->slug)}}">
                                <img src="{{asset('uploads/products/preview')}}/{{$product->preview_image}}" alt="Product image" class="product-image">
                            </a>

                            <div class="product-countdown" data-until="+{{Carbon\Carbon::now()->diffInHours($product->validity, false)}}h" data-relative="true" data-labels-short="true"></div>

                            <div class="product-action-vertical">
                                
                                <a href="{{route('product_quick_view', $product->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                <input type="hidden" class="product_id_value" value="{{$product->id}}">
                                
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="{{route('category.one', $product->rel_to_category->id)}}">{{$product->rel_to_category->category_name}}</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="{{route('product.details', $product->slug)}}">{{Str::limit($product->product_name, '33', '')}}</a></h3><!-- End .product-title -->
                            @if ($product->product_discount != null)
                                <span class="new-price">৳ {{$product->after_discount}}</span>
                                <span class="old-price">Was ৳ {{$product->product_price}}</span>
                            @else
                                <span class="product-price">৳ {{$product->after_discount}}</span>
                            @endif
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div>
                @endforeach
            </div>
        </div><!-- .End .tab-pane -->
    </div><!-- End .tab-content -->
    <div class="load-more-container text-center mb-5">
        <button type="button" class="btn btn-outline-darker btn-load-more">More Products <i class="icon-refresh"></i></button>
    </div>
</div>
@endsection


@section('mobile')
<ul class="mobile-cats-menu">
    @foreach ($categories->take(10) as $category)
    <li><a href="{{route('category.one',$category->id)}}">{{$category->category_name}}</a></li>
    @endforeach
    <li><a href="#">All</a></li>
</ul>
@endsection

@section('footer_script')
<script>
    $(".col-none").slice(0, 12).show();

    $(".btn-load-more").on("click", function() {
        $(".col-none:hidden").slice(0, 6).show();
        if($(".col-none:hidden").length == 0) {
            // $(".btn-load-more").fadeOut();
            $(".btn-load-more").replaceWith("No more products");
        }
    })
</script>
@endsection