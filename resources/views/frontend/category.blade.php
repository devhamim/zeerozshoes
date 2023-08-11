@extends('frontend.layouts.app')

@section('content')
<!-- ======================= Top Breadcrubms ======================== -->
<div class="gray py-3 pt-5">
    <div class="container">
        <div class="row">
            <div class="colxl-12 col-lg-12 col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Category Page</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ======================= Top Breadcrubms ======================== -->

<!-- ======================= Blog Start ============================ -->
<section class="middle">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center">
                    <h2 class="off_title">Category</h2>
                    <h3 class="ft-bold pt-3">New Updates</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <input type="text">
            @foreach ($categorys as $category)
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="_blog_wrap">
                    <div class="_blog_thumb mb-2">
                        <label for="category{{ $category->id }}">
                            <a class="d-block"><img src="{{ asset('uplode/category') }}/{{ $category->category_img }}" class="img-fluid rounded" alt="" /></a>
                        </label>
                    </div>
                    <div style="position: relative">
                        <input style="left: 0; display: none" id="category{{ $category->id }}" class="category_id" name="category_id" type="radio" value="{{ $category->id }}" @if(isset($_GET['category_id'])) @if($_GET['category_id']==$category->id)
                        checked
                        @endif
                        @endif
                        >
                    </div>
                    <div class="_blog_caption">
                        <h5 class="bl_title lh-1">
                            <label for="category{{ $category->id }}">
                                <a>{{ $category->name }}</a>
                            </label>
                        </h5>
                        <p>{{ $category->description }}</p>
                    </div>

                </div>
            </div>
            @endforeach
        </div>

        <div class="row justify-content-center">
            {{ $categorys->links() }}
        </div>

    </div>
</section>
<!-- ======================= Blog Start ============================ -->
@endsection
