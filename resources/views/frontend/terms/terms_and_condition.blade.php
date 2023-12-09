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
<div class="container page-content">
    <div class="border-bottom mb-4">
        <div class="breadcrumbs row align-items-center justify-content-between d-none d-md-flex">
            <div class="col-12">
                <ul class="breadcrumbs_content list-unstyled">
                    
                    <li><span>রিটার্ন পলিসি</span></li>
                </ul>
            </div>

        </div>
    </div>
    <div class="row mt-5 mb-7">
        <div class="col-12">
            {!! $terms->first()->terms_conditions !!}
        </div>
    </div>
</div>
@endsection
