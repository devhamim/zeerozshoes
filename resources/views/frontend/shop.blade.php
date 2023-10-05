@extends('frontend.layouts.app')

@section('content')


<!-- ======================= Shop Style 1 ======================== -->
<section class="bg-cover" style="background:url({{ asset('frontend') }}/assets/img/banner-2.png) no-repeat;">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="text-left py-5 mt-3 mb-3">
                    <h1 class="ft-medium mb-3">Shop</h1>
                    <ul class="shop_categories_list m-0 p-0">
                        <li><a >Men</a></li>
                        <li><a >Speakers</a></li>
                        <li><a >Women</a></li>
                        <li><a >Accessories</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======================= Shop Style 1 ======================== -->


<!-- ======================= Filter Wrap Style 1 ======================== -->
<section class="py-3 br-bottom br-top">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('shop') }}">Shop</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- ============================= Filter Wrap ============================== -->


<!-- ======================= All Product List ======================== -->
<section class="middle">
    <div class="container">
        <div class="row">

            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 p-xl-0">
                <div class="search-sidebar sm-sidebar border">
                    <div class="search-sidebar-body">
                        <!-- Single Option -->
                        <div class="single_search_boxed">

                            <div class="widget-boxed-header">
                                <h4><a href="#pricing" data-toggle="collapse" aria-expanded="false" role="button">Pricing</a></h4>
                            </div>
                            <div class="widget-boxed-body collapse show" id="pricing" data-parent="#pricing">
                                <div class="row">
                                    <div class="col-lg-6 pr-1">
                                        <div class="form-group pl-3">
                                            <input type="number" class="form-control" id="min" name="min" placeholder="Min" value="{{ @$_GET['min'] }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 pl-1">
                                        <div class="form-group pr-3">
                                            <input type="number" class="form-control" id="max" name="max" placeholder="Max" value="{{ @$_GET['max'] }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group px-3" id="sort_price">
                                            <button type="submit" class="btn form-control">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Option -->
                        <div class="single_search_boxed">
                            <div class="widget-boxed-header">
                                <h4><a href="#Categories" data-toggle="collapse" aria-expanded="false" role="button">Categories</a></h4>
                            </div>
                            <div class="widget-boxed-body collapse show" id="Categories" data-parent="#Categories">
                                <div class="side-list no-border">
                                    <!-- Single Filter Card -->
                                    <div class="single_filter_card">
                                        <div class="card-body pt-0">
                                            <div class="inner_widget_link">
                                                <ul class="no-ul-list">
                                                    @foreach ($categorys as $category)
                                                    <li class="d-flex" style="justify-content: space-between; margin-right: 10px">
                                                        <input id="category{{ $category->id }}" class="category_id" name="category_id" type="radio" value="{{ $category->id }}"
                                                        @if(isset($_GET['category_id']))
                                                            @if($_GET['category_id'] == $category->id)
                                                                checked
                                                            @endif
                                                        @endif
                                                        >
                                                        <label for="category{{ $category->id }}" class="checkbox-custom-label">{{ $category->name }}</label>
                                                        <p>{{ App\Models\product::where('category_id', $category->id)->count() }}</p>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Option -->
                        <div class="single_search_boxed">
                            <div class="widget-boxed-header">
                                <h4><a href="#brands" data-toggle="collapse" aria-expanded="false" role="button">Brands</a></h4>
                            </div>
                            <div class="widget-boxed-body collapse show" id="brands" data-parent="#brands">
                                <div class="side-list no-border">
                                    <!-- Single Filter Card -->
                                    <div class="single_filter_card">
                                        <div class="card-body pt-0">
                                            <div class="inner_widget_link">
                                                <ul class="no-ul-list">

                                                    @foreach ($brands as $brand)
                                                    <li class="d-flex" style="justify-content: space-between; margin-right: 10px">
                                                        <input id="brand{{ $brand->id }}" class="brand_id" name="brand_id" type="radio" value="{{ $brand->id }}"
                                                        @if(isset($_GET['brand_id']))
                                                            @if($_GET['brand_id'] == $brand->id)
                                                                checked
                                                            @endif
                                                        @endif
                                                        >
                                                        <label for="brand{{ $brand->id }}" class="checkbox-custom-label">{{ $brand->name }}</label>
                                                        <p class="">{{ App\Models\product::where('brand_id', $brand->id)->count() }}</p>
                                                    </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Option -->
                        <div class="single_search_boxed">
                            <div class="widget-boxed-header">
                                <h4><a href="#colors" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Colors</a></h4>
                            </div>
                            <div class="widget-boxed-body collapse show" id="colors" data-parent="#colors">
                                <div class="side-list no-border">
                                    <!-- Single Filter Card -->
                                    <div class="single_filter_card">
                                        <div class="card-body pt-0">
                                            <div class="text-left">

                                                @foreach ($colors->skip(1) as $color)
                                                <div class="  form-check-inline mb-1">
                                                    <input name="color" class="color_idd" id="color{{$color->id}}" value="{{$color->id}}" type="radio"
                                                    @if (isset($_GET['color_id']))
                                                        @if ($_GET['color_id'] == $color->id)
                                                            checked
                                                        @endif
                                                    @endif
                                                    >
                                                    <label for="color{{$color->id}}">{{$color->name}}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Option -->
                        <div class="single_search_boxed">
                            <div class="widget-boxed-header">
                                <h4><a href="#size" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Size</a></h4>
                            </div>
                            <div class="widget-boxed-body collapse show" id="size" data-parent="#size">
                                <div class="side-list no-border">
                                    <!-- Single Filter Card -->
                                    <div class="single_filter_card">
                                        <div class="card-body pt-0">
                                            <div class="text-left pb-0 pt-2">
                                                @foreach ($sizes->skip(1) as $size)
                                                <div class="form-check form-option form-check-inline mb-2">
                                                    <input name="size" class="size_idd" id="size{{$size->id}}" value="{{$size->id}}" type="radio"
                                                    @if (isset($_GET['size_id']))
                                                        @if ($_GET['size_id'] == $size->id)
                                                            checked
                                                        @endif
                                                    @endif
                                                    >
                                                    <label for="size{{$size->id}}">{{$size->name}}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group px-3 mt-5 text-center">
                                <a href="{{ route('shop') }}" class="btn btn-danger form-control">Reset Filter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="border mb-3 mfliud">
                            <div class="row align-items-center py-2 m-0">
                                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
                                    <h6 class="mb-0">{{ $products_count }} Items Found</h6>
                                </div>

                                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                                    <div class="filter_wraps d-flex align-items-center justify-content-end m-start">
                                        <div class="single_fitres mr-2 br-right">
                                            <select class="form-control" id="sort" name="sort">
                                            <option value="">Default Sorting</option>
                                                <option {{ @$_GET['sort'] == 1?'selected':'' }} value="1">Sort by: A - Z</option>
                                                <option {{ @$_GET['sort'] == 2?'selected':'' }} value="2">Sort by: Z - A</option>
                                                <option {{ @$_GET['sort'] == 3?'selected':'' }} value="3">Sort by: Hight - Low price</option>
                                                <option {{ @$_GET['sort'] == 4?'selected':'' }} value="4">Sort by: Low - Hight price</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- row -->
                <div class="row align-items-center rows-products">

                    <!-- Single -->
                    @foreach ($products as $product)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-6">
                        <div class="product_grid card b-0">
                            {{-- <div class="badge bg-info text-white position-absolute ft-regular ab-left text-upper">New</div> --}}
                            <div class="card-body p-0">
                                <div class="shop_thumb position-relative">
                                    <a class="card-img-top d-block overflow-hidden" href="{{ route('singel.product', $product->slug) }}">
                                        <img class="card-img-top" src="{{ asset('uplode/product') }}/{{ $product->thumbnail }}" alt="..."></a>
                                    <div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                                        <div class="edlio"><a href="{{ route('singel.product', $product->slug) }}" data-toggle="modal" data-target="#quickview" class="text-white fs-sm ft-medium"><i class="fas fa-eye mr-1"></i>Quick View</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer b-0 p-0 pt-2 bg-white">

                                <div class="text-left">
                                    <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="{{ route('singel.product', $product->slug) }}">{{ $product->title }}</a></h5>
                                    <div class="elis_rty"><span class="ft-bold text-dark fs-sm">{{ number_format($product->total_price) }} TK</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                {{ $products->links() }}
                <!-- row -->
            </div>

        </div>
    </div>
</section>
<!-- ======================= All Product List ======================== -->



@endsection
