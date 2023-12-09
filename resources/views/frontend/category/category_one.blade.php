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
                    <li><a href="{{route('category.one',$category->id)}}">{{$category->category_name}}</a></li>
                @endforeach
                <li><a href="{{route('category')}}">All</a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection
@section('content')
<div class="mb-4"></div>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 d-none d-sm-block order-lg-first order-first">
            <div class="widget widget-collapsible">
                <h3 class="widget-title">
                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                        Category
                    </a>
                </h3>
    
                <div class="collapse show" id="widget-1">
                    <div class="widget-body">
                        <div class="filter-items filter-items-count">
                            @if (!empty($_GET['category']))
                                @php
                                    $filter_cats = explode(',', $_GET['category']);
                                @endphp
                            @endif
                            @foreach ($categories as $category)
                            <div class="filter-item">
                                <div class="">
                                    <a href="{{route('category.one', $category->id)}}" data-filter="*" >
                                        <label class="custom-control-label category-custom-control-label" for="cat-{{$category->id}}">{{$category->category_name}}</label>
                                    </a>
                                </div>
                                <span class="item-count">{{App\Models\Product::where('category_id', $category->id)->count()}}</span>
                            </div>
                            @endforeach
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-12">
            <div class="mb-1"></div>
            <div class="container new-arrivals">

                <div class="heading heading-flex heading-border">
                    <div class="heading-left mb-1">
                        <h2 class="title">Category Products</h2>
                    </div>
                </div>
            
                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" id="arrivals-all-tab" role="tabpanel" aria-labelledby="arrivals-all-link">
                        <div class="row">
                            @forelse ($products as $product)
                            <div class="col-xl-2 col-lg-3 col-md-4 col-6 col-none cartpage">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{route('product.details', $product->slug)}}">
                                            <img src="{{asset('uploads/products/preview')}}/{{$product->preview_image}}" alt="Product image" class="product-image">
                                        </a>
            
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
                                        <h3 class="product-title"><a href="{{route('product.details', $product->slug)}}">{{Str::limit($product->product_name, '19', '')}}</a></h3><!-- End .product-title -->
                                        @if ($product->product_discount != null)
                                            <span class="new-price">৳ {{$product->after_discount}}</span>
                                            <span class="old-price">Was ৳ {{$product->product_price}}</span>
                                        @else
                                            <span class="product-price">৳ {{$product->after_discount}}</span>
                                        @endif
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div>
                            @empty
                            <h3 class="text-danger text-center m-auto">No product has been found.</h3>
                            @endforelse
                        </div>
                    </div>
                </div><!-- End .tab-content -->
                <div class="load-more-container text-center mb-5">
                    @if (App\Models\Product::where('status', '1')->where('category_id', $category_id_num)->exists())
                    <button class="btn btn-outline-darker btn-load-more">Products <i class="icon-refresh"></i></button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class=""></div>
@endsection

@section('mobile')
<ul class="mobile-cats-menu">
    @foreach ($categories as $category)
    <li><a href="{{route('category', $category->id)}}">{{$category->category_name}}</a></li>
    @endforeach
    <li><a href="#">All</a></li>
</ul>
@endsection

@section('footer_script')
    <script>
        $(".col-none").slice(0, 3).show();

        $(".btn-load-more").on("click", function() {
            $(".col-none:hidden").slice(0, 3).show();
            if($(".col-none:hidden").length == 0) {
                // $(".btn-load-more").fadeOut();
                $(".btn-load-more").replaceWith("No more products");
            }
        })
    </script>
@endsection
