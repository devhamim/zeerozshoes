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
                    <li><a href="{{route('category.one', $category->id)}}">{{$category->category_name}}</a></li>
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
    <div class="col-lg-12 col-12">
        <div class="mb-1"></div>

    <div class="">

    <div class="heading heading-flex heading-border">
        <div class="heading-left mb-1">
            <h2 class="title">Categorys</h2>
        </div>
    </div>

    

    <div class="">
        <div class="tab-pane p-0 fade show active" id="arrivals-all-tab" role="tabpanel" aria-labelledby="arrivals-all-link">
            <div class="row ">
                @if (!empty($_GET['category']))
                    @php
                        $filter_cats = explode(',', $_GET['category']);
                    @endphp
                @endif
                @foreach ($categories as $categorie)
                <div class="col-lg-2 col-md-6 col-6  col-none cartpage">
                    <div class="product">
                        <figure class="product-media">
                            <a href="{{route('category.one', $categorie->id)}}">
                                <img src="{{asset('uploads/category')}}/{{$categorie->category_image}}" alt="Product image" class="product-image">
                            </a>

                            <div class="product-action">
                                <input type="hidden" class="product_id_value" value="{{$categorie->id}}">
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="{{route('category.one', $category->id)}}">{{Str::limit($categorie->category_name, '19', '')}}</a></h3><!-- End .product-title -->

                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane p-0 fade" id="arrivals-women-tab" role="tabpanel" aria-labelledby="arrivals-women-link">
        </div>
    </div><!-- End .tab-content -->
    <div class="load-more-container text-center mb-5">
        <button class="btn btn-outline-darker btn-load-more">More Products <i class="icon-refresh"></i></button>
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
    <li><a href="{{route('category.one',$category->id)}}">{{$category->category_name}}</a></li>
    @endforeach
    <li><a href="#">All</a></li>
</ul>
@endsection

@section('footer_script')
    <script>
        $(".col-none").slice(0, 12).show();

        $(".btn-load-more").on("click", function() {
            $(".col-none:hidden").slice(0, 5).show();
            if($(".col-none:hidden").length == 0) {
                // $(".btn-load-more").fadeOut();
                $(".btn-load-more").replaceWith("No more Categorys");
            }
        })
    </script>
@endsection