@extends('frontend.master.master')
@section('computer')
<div class="dropdown category-dropdown show is-on" data-visible="false">
    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
        ক্যাটেগরীজ
    </a>
    <div class="dropdown-menu">
        <nav class="side-nav">
            <ul class="menu-vertical sf-arrows">
                @foreach ($categories->take(10) as $category)
                    <li><a href="{{route('category', $category->id)}}">{{$category->category_name}}</a></li>
                @endforeach
                <li><a href="{{route('category')}}">All</a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection
@section('content')
<div class="page-content">
    <div class="container mt-2">
        <div class="product-details-top">
            <div class="product_data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <figure class="product-main-image">
                                        
                                    <img id="product-zoom" src="{{asset('uploads/products/gallery')}}/{{$product_gallery->first()->gallery_image}}" data-zoom-image="{{asset('uploads/products/gallery')}}/{{$product_gallery->first()->gallery_image}}" alt="product image">
                                    
                                    <a href="" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure>
    
                                <div id="product-zoom-gallery" class="product-image-gallery">
                                    @foreach ($product_gallery as $sl=>$gallery)
                                        
                                    
                                    <a class="product-gallery-item {{$sl == 0 ? 'active': ''}}" href="#" data-image="{{asset('uploads/products/gallery')}}/{{$gallery->gallery_image}}" data-zoom-image="{{asset('uploads/products/gallery')}}/{{$gallery->gallery_image}}">
                                            <img style="height: 100%" src="{{asset('uploads/products/gallery')}}/{{$gallery->gallery_image}}" alt="product side">
                                    </a>
                                    @endforeach
                                </div><!-- End .product-image-gallery -->
                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->
    
                    <div class="col-md-8">
                        <form action="{{route('buy.store')}}" method="POST">
                            @csrf
                            <div class="product-details">
                                <h1 class="product-title">{{$product_info->first()->product_name}}</h1>
                                <div class="product-price">
                                    Price: <span class="pl-3">৳ {{$product_info->first()->product_discount}}</span>
                                    @if ($product_info->first()->product_price != null)
                                        <span class="line-through pl-3 text-dark" style="font-size: 14px">৳{{$product_info->first()->product_price}}</span>
                                    @endif
                                </div><!-- End .product-price -->
                                <div class="product_code">
                                    <p class="sku_text"><span>প্রোডাক্ট কোড: </span> <span class="p-0 pr-1">{{ $product_info->first()->slug }}</span></p>
                                </div>
                                <div class="details-filter-row details-row-size">
                                    <input type="hidden" name="product_id" class="product_id" value="{{$product_info->first()->id}}">
                                </div><!-- End .details-filter-row -->
    
                                <div class="details-filter-row details-row-size">
                                    <label for="qty">পরিমান :</label>
                                    <div class="product-details-quantity">
                                        <input type="number" name="quantity" id="qty" class="form-control qty-input" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                        
                                    </div><!-- End .product-details-quantity -->
                                </div><!-- End .details-filter-row -->
                                <ul>
                                    <li>ঢাকার ভিতরে ডেলিভারি	৳ 80</li>
                                    <li>ঢাকার বাইরে ডেলিভারি	৳ 150</li>
                                    <li>ঢাকার বাহিরে কুরিয়ার খরচ অগ্রিম প্রদান করতে হবে	৳ 150</li>
                                </ul>
                                <div style="width: 100%; border: 2px dashed #ddd;">
                                    <div class="obd-pre-order-product-details-prod-short-desc-call"> 
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div>
                                                    <h5 class="d-block">ফোনে অর্ডারের জন্য ডায়াল করুন</h5>
                                                    <a href="tel:01954-056251" class="support-number">  
                                                        <i class="fa fa-phone"></i> 
                                                        01954-056251 <span class="bkash_personal">Customer Care</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="social-media-business d-flex pl-5 align-items-center justify-content-center">
                                                    <span style="height: 120px; border: 2px dashed #ddd;"></span>
    
                                                    {{-- <a href="https://api.whatsapp.com/send?text=Check%20out%20this%20product:%20{{ urlencode($product_info->first()->product_name) }}%20-%20{{ urlencode(route('product.details',$product_info->first()->slug)) }}" target="_blank"><i class="icon-whatsapp"></i></a>
    
                                                    <a href="https://www.facebook.com/dialog/send?app_id=794605019112340&link={{ urlencode(route('product.details',$product_info->first()->slug)) }}&redirect_uri={{ urlencode(route('product.details',$product_info->first()->slug)) }}&quote={{ urlencode($product_info->first()->product_name) }}" target="_blank"><i class="icon-facebook-messenger"></i></a> --}}
    
                                                    <ul class="text-danger">
                                                        <!--<li>বিকাশ মার্চেন্ট নাম্বার: 01893-900580</li>-->
                                                        <!--<li>বিকাশ / নগদ নাম্বার : 01752-774046</li>-->
                                                        <li>বিকাশ / নগদ নাম্বার : 01954-056251</li>>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            
                                           
                                        </div>
                                        
                                    </div>
                                    
                                </div>
    
                                <div class="product-details-action mt-3">
                                    <button type="submit" class="btn-product btn-cart btn-buy mr-5" name="btn" value="2"><span>অর্ডার করুন</span></button>
                                    <button type="submit" class="btn-product btn-cart" name="btn" value="1" id="load"><span>কার্ট-এ যোগ করুন</span></button>
                                </div><!-- End .product-details-action -->
    
                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>ক্যাটেগরীজ:</span>
                                        <a href="{{route('category.one', $product_info->first()->rel_to_category->id)}}">{{$product_info->first()->rel_to_category->category_name}}</a>
                                    </div><!-- End .product-cat -->
    
                                    {{-- <div class="social-icons social-icons-sm">
                                        <span class="social-label">Share:</span>
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                    </div> --}}
                                </div><!-- End .product-details-footer -->
                            </div><!-- End .product-details -->
                        </form>
                    </div><!-- End .col-md-6 -->
                </div>
            </div>
        </div><!-- End .product-details-top -->

        <div class="product-details-tab">
            <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">পন্যের বিবরণ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">ডেলিভারি এবং রিটার্ন পলিসি</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                    <div class="product-desc-content">
                        <h3>Product Information</h3>
                        <p>{!! $product_info->first()->description !!}</p>
                    </div><!-- End .product-desc-content -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                    <div class="product-desc-content">
                        <h3>Information</h3>
                        <p>
                            {!! $returns->first()->terms_conditions !!}
                        </p>
                    </div><!-- End .product-desc-content -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .product-details-tab -->

        <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
            data-owl-options='{
                "nav": false, 
                "dots": true,
                "margin": 20,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":1
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
                    "1200": {
                        "items":4,
                        "nav": true,
                        "dots": false
                    }
                }
            }'>
            @foreach ($related_products as $products)
            <div class="product product-7 text-center cartpage">
                <figure class="product-media">
                    <span class="product-label label-new">New</span>
                    <a href="{{route('product.details', $products->slug)}}">
                        <img src="{{asset('uploads/products/preview')}}/{{$products->preview_image}}" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="{{route('product_quick_view', $products->id)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                    </div><!-- End .product-action-vertical -->

                    <div class="product-action">
                       
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">{{$products->rel_to_category->category_name}}</a>
                    </div><!-- End .product-cat -->
                    <h3 class="product-title"><a href="{{route('product.details', $products->slug)}}">{{$products->product_name}}</a></h3><!-- End .product-title -->
                    @if ($products->product_discount != null)
                        <span class="new-price">৳ {{$products->after_discount}}</span>
                        <span class="old-price">Was ৳ {{$products->product_price}}</span>
                    @else
                        <span class="product-price">৳ {{$products->after_discount}}</span>
                    @endif
                </div><!-- End .product-body -->
            </div>
            @endforeach
        </div><!-- End .owl-carousel -->
    </div><!-- End .container -->
</div>
@endsection

@section('mobile')
<ul class="mobile-cats-menu">
    @foreach ($categories as $category)
    <li><a href="{{route('category', $category->id)}}">{{$category->category_name}}</a></li>
    @endforeach
    <li><a href="{{route('category')}}">All</a></li>
</ul>
@endsection



