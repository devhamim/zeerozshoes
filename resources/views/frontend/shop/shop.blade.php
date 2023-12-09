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
<div class="page-content mt-2">
    {{-- <form action="{{route('shop.filter')}}" method="POST">
        @csrf --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="toolbox">
                    <div class="toolbox-left">
                        <div class="toolbox-info">
                            {{-- Showing <span>{{$products->count()}} of {{App\Models\Product::all()->count()}}</span> Products --}}
                        </div><!-- End .toolbox-info -->
                    </div><!-- End .toolbox-left -->

                    <div class="toolbox-right">
                        <div class="toolbox-sort">
                            <label for="sortby">Sort by:</label>
                            <div class="select-custom">
                                <select name="sort" id="sort" class="form-control">
                                    <option value="" selected="selected">Default sort</option>
                                    <option value="1" {{@$_GET['sort'] == '1' ? 'selected': ''}}>Price - lower to higher</option>
                                    <option value="2" {{@$_GET['sort'] == '2' ? 'selected': ''}}>Price - lower to higher</option>
                                    <option value="3" {{@$_GET['sort'] == '3' ? 'selected': ''}}>Alphabetical ascending</option>
                                    <option value="4" {{@$_GET['sort'] == '4' ? 'selected': ''}}>Alphabetical descending</option>
                                    <option value="5" {{@$_GET['sort'] == '5' ? 'selected': ''}}>Discount - lower to higher</option>
                                    <option value="6" {{@$_GET['sort'] == '6' ? 'selected': ''}}>Discount - higher to lower</option>
                                </select>
                            </div>
                        </div><!-- End .toolbox-sort -->
                    </div><!-- End .toolbox-right -->
                </div><!-- End .toolbox -->

                <div class="products mb-3">
                    <div class="row justify-content-center">


                        @forelse ($search_product as $product)
                            <div class="col-6 col-md-6 col-lg-4 col-xl-3 cartpage ">
                                <div class="product product-7 text-center col-none">
                                    <figure class="product-media">
                                        {{-- <span class="product-label label-new">New</span> --}}
                                        <a href="{{route('product.details', $product->slug)}}">
                                            <img src="{{asset('uploads/products/preview')}}/{{$product->preview_image}}" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action">
                                            <input type="hidden" class="product_id_value" value="{{$product->id}}">
                                        </div>
                                    </figure>

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="{{route('category.one', $product->rel_to_category->id)}}">{{$product->rel_to_category->category_name}}</a>
                                        </div>
                                        <h3 class="product-title"><a href="{{route('product.details', $product->slug)}}">{{$product->product_name}}</a></h3><!-- End .product-title -->
                                         @if ($product->product_price != null)
                                            <span class="new-price d-block">৳ {{$product->product_discount}}</span>
                                            <del style="color: #cccccc">Was ৳ {{$product->product_price}}</del>
                                        @else
                                            <span class="product-price">৳ {{$product->product_discount}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                        <h2 class="text-center m-auto text-danger mt-5 pt-5">No product found</h2>
                        @endforelse


                    </div>
                </div>


                <div class="text-center mt-5 mb-2">
                    <a type="button" class="btn btn-viewMore btn-load-more">
                        <span>VIEW MORE PRODUCTS</span>
                        <i class="icon-long-arrow-right"></i>
                    </a>
                </div>

            </div><!-- End .col-lg-9 -->
            <aside class="col-lg-3 col-5 d-none d-sm-block order-lg-first order-first">

                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-clean">
                            <label>Filters:</label>
                            <a href="{{route('shop')}}">Clean All</a>
                        </div>

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
                                                {{-- <input id="cat{{$category->id}}" class="custom-control-input category_id" name="category" type="checkbox" value="{{$category->id}}" {{($category->id == @$_GET['category_id'])?'checked': ''}}> --}}
                                                <input type="radio" name="category" class="category_id" value="{{$category->id}}" id="cat-{{$category->id}}" {{($category->id == @$_GET['category_id'])?'checked': ''}} >
                                                <label class="custom-control-label category-custom-control-label" for="cat-{{$category->id}}">{{$category->category_name}}</label>
                                            </div>
                                            <span class="item-count">{{App\Models\Product::where('category_id', $category->id)->count()}}</span>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </form> --}}
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .page-content -->
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
    $(".col-none").slice(0, 12).show();

    $(".btn-load-more").on("click", function() {
        $(".col-none:hidden").slice(0, 6).show();
        if($(".col-none:hidden").length == 0) {
            $(".btn-load-more").replaceWith("No more products");
        }
    })
</script>

{{-- search --}}
{{-- <script>
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
</script> --}}
@endsection
