@extends('frontend.master.master')
@section('computer')
<div class="dropdown category-dropdown show is-on" data-visible="false">
    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
        ক্যাটেগরীজ
    </a>
    <div class="dropdown-menu">
        <nav class="side-nav">
            <ul class="menu-vertical sf-arrows">
                @foreach (App\Models\Category::all() as $category)
                    <li><a href="{{route('category', $category->id)}}">{{$category->category_name}}</a></li>
                @endforeach
                <li><a href="{{route('category')}}">All</a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection

@section('content')
{{-- @if (session('success')) --}}
<div class="page-content mt-3">
        <div class="col-lg-7 m-auto mt-5">
            <div class="summary summary-cart">
                <h3 class="text-success">Order Place Successfully</h3><!-- End .summary-title -->
                <p class="ft-regular fs-md text-success">আপনার অর্ডারটি  <span class="text-body text-dark">{{ session('order_id') }}</span> সফলভাবে সম্পন্ন হয়েছে আমাদের কল সেন্টার থেকে ফোন করে আপনার অর্ডারটি কনফার্ম করা হবে</p>
                <a class="btn btn-primary mt-2" href="{{ url('/') }}">প্রোডাক্ট বাছাই করুন</a>
            </div><!-- End .summary -->
        </div>
</div>
{{-- @endif --}}
@endsection

@section('mobile')
<ul class="mobile-cats-menu">
    @foreach (App\Models\Category::all() as $category)
    <li><a href="{{route('category', $category->id)}}">{{$category->category_name}}</a></li>
    @endforeach
    <li><a href="#">All</a></li>
</ul>
@endsection