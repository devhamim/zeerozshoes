@extends('frontend.master.master')
@section('computer')

<div class="dropdown category-dropdown show is-on" data-visible="true">
    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
        ক্যাটেগরীজ
    </a>
    <div class="dropdown-menu show">
        <nav class="side-nav">
            <ul class="menu-vertical sf-arrows">
                @foreach ($categories->take(10) as $category)
                    <li><a href="{{route('category.one',$category->id)}}">{{$category->category_name}}</a></li>
                @endforeach 
                <li><a href="{{route('category')}}">All</a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3"></div>
    <div class="col-lg-9">
        <div class="intro-slider-container">
    
            <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
                    "nav": false,
                    "responsive": {
                        "992": {
                            "nav": true
                        }
                    }
                }'>
            
                @foreach ($banners as $banner)
                <a href="{{ $banner->banner_link }}" target="_blank">
                <div class="intro-slide" style="background-image: url({{asset('uploads/banner')}}/{{ $banner->banner_image }});">
                        <div class="container intro-content">
                            <div class="row">
                                <div class="col-auto offset-lg-3 intro-col">
                                    <h2 class="intro-title">{{ $banner->banner_title }}</h2><!-- End .intro-title -->

                                    
                                </div><!-- End .col-auto offset-lg-3 -->
                            </div>
                        </div><!-- End .container intro-content -->
                    </div><!-- End .intro-slide -->
                </a>
                @endforeach
            </div><!-- End .owl-carousel owl-simple -->

            <span class="slider-loader"></span><!-- End .slider-loader -->
        </div>
    </div>
    </div>


</div>
<!-- End .intro-slider-container -->


<div class="mb-4"></div>

<div class="container">
<div class="heading heading-flex heading-border">
    <div class="heading-left">
        <h2 class="title">প্রোডাক্ট ক্যাটেগরীজ</h2>
    </div>

   <div class="heading-right">
        <a href="{{route('category')}}" class="see_more"><h3 class="me-1">সকল প্রোডাক্ট ক্যাটেগরীজ</h3><span>></span></a>
   </div>
</div>

<div class="cat-blocks-container">
    <div class="row">
        @foreach ($categoryy as $category)
        <div class="col-6 col-sm-4 col-lg-2">
            <a href="{{route('category.one', $category->id)}}" class="cat-block">
                <figure>
                    <span>
                        <img class="pt-2 pb-1" src="{{asset('uploads/category')}}/{{$category->category_image}}" alt="Category image">
                    </span>
                </figure>

                <h3 class="cat-block-title">{{$category->category_name}}</h3>
            </a>
        </div>
        @endforeach
    </div>
</div>
</div>

<div class="mb-2"></div>
<div class="container electronics">
    <div class="heading heading-flex heading-border ">
        <div class="heading-left">
            <h2 class="title">হট ডিল</h2>
        </div>

    <div class="heading-right">
            {{-- <a href="{{route('category')}}" class="see_more"><h3 class="me-1">See More</h3><span>></span></a> --}}
    </div>
    </div>

    <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="elec-new-tab" role="tabpanel" aria-labelledby="elec-new-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1280": {
                                "items":6,
                                "nav": true
                            }
                        }
                    }'>
                    @foreach ($discount_products as $product)
                        
                    
                    <div class="product cartpage">
                        <figure class="product-media">
                            {{-- <span class="product-label label-new">off {{$product->product_discount}}Tk</span> --}}
                            <a href="{{route('product.details', $product->slug)}}">
                                <img src="{{asset('uploads/products/preview')}}/{{$product->preview_image}}" alt="Product image" class="product-image">
                            </a>
                            <div class="product-action-vertical">
                                <p style="background-image: url( '{{asset('frontend/assets/images/discount.png')}}' )"></p>
                            </div>

                            <div class="text-center">
                                <form action="{{ route('buy.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn-product btn-cart btn-buy mr-5 w-100" name="btn" value="2"><span>অর্ডার করুন</span></button>
                                </form>
                            </div>
                        </figure>

                        <div class="product-body">
                            @if ($product->product_price != null)
                                <span class="new-price d-block">৳ {{$product->product_discount}}</span>
                                <del style="color: #cccccc">Was ৳ {{$product->product_price}}</del>
                            @else
                                <span class="product-price">৳ {{$product->product_discount}}</span>
                            @endif
                            <h3 class="product-title"><a href="{{route('product.details', $product->slug)}}">{{Str::limit($product->product_name, '19', '')}}</a></h3>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
    </div><!-- End .tab-content -->
</div>

<div class="container new-arrivals">

<div class="heading heading-flex heading-border">
    <div class="heading-left mb-1">
        <h2 class="title">প্রয়োজনীয় প্রোডাক্ট</h2>
    </div>

   <!-- <div class="heading-right">
        <a href="" class="see_more"><h3 class="me-1">See More</h3><span>></span></a>
   </div> -->
</div>


<div class="tab-content tab-content-carousel">
    <div class="tab-pane p-0 fade show active" id="arrivals-all-tab" role="tabpanel" aria-labelledby="arrivals-all-link">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-lg-2 col-md-3 col-6 cartpage col-none">
                <div class="product">
                    <figure class="product-media">
                        <a href="{{ route('product.details', $product->slug) }}">
                            <img src="{{ asset('uploads/products/preview') }}/{{ $product->preview_image }}" alt="Product image" class="product-image">
                        </a>
                        <div class="product-action">
                            <input type="hidden" class="product_id_value" value="{{ $product->id }}">
                        </div>
                        <form action="{{ route('buy.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn-product btn-cart btn-buy mr-5 w-100" name="btn" value="2"><span>অর্ডার করুন</span></button>
                        </form>
                    </figure>
                    <div class="text-center">
                        <div class="product-body">
                             @if ($product->product_price != null)
                                <span class="new-price d-block">৳ {{$product->product_discount}}</span>
                                <del style="color: #cccccc">Was ৳ {{$product->product_price}}</del>
                            @else
                                <span class="product-price">৳ {{$product->product_discount}}</span>
                            @endif
                            <h3 class="product-title"><a href="{{ route('product.details', $product->slug) }}">{{ Str::limit($product->product_name, '19', '') }}</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End .tab-content -->
<div class="load-more-container text-center mb-3">
    <button type="button" class="btn btn-outline-darker btn-load-more">More Products <i class="icon-refresh"></i></button>
</div>
</div>

<div class=""></div>
@endsection


@section('mobile')
<ul class="mobile-cats-menu">
    @foreach ($categories as $category)
    <li><a href="{{route('category.one',$category->id)}}">{{$category->category_name}}</a></li>
    
    @endforeach
    <li><a href="{{route('category')}}">All</a></li>
</ul>
@endsection

@section('footer_script')
    <script>
        $(".col-none").slice(0, 18).show();

        $(".btn-load-more").on("click", function() {
            $(".col-none:hidden").slice(0, 6).show();
            if($(".col-none:hidden").length == 0) {
                // $(".btn-load-more").fadeOut();
                $(".btn-load-more").replaceWith("No more products");
            }
        })
    </script>
@endsection