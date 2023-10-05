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
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ======================= Top Breadcrubms ======================== -->

<!-- ======================= About Us Detail ======================== -->
{{-- @foreach ($abouts as $about)
<section class="middle">
    <div class="container">
        <div class="row align-items-center justify-content-between">

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="abt_caption">
                    <h2 class="ft-medium mb-4">{{ $about->title }}</h2>
                    <p class="mb-4">{{ $about->description }}</p>

                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="abt_caption">
                    <img src="{{ asset('uplode/about') }}/{{ $about->image }}" class="img-fluid rounded" alt="" />
                </div>
            </div>

        </div>
    </div>
</section>
@endforeach --}}
<!-- ======================= About Us End ======================== -->

<!-- ======================= About Us Detail ======================== -->
@foreach ($abouts->chunk(ceil($abouts->count() / 2))[0] as $about)
<section class="middle">
    <div class="container">
        <div class="row align-items-center justify-content-between">

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="abt_caption">
                    <img src="{{ asset('uplode/about') }}/{{ $about->image }}" class="img-fluid rounded" alt="" />
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="abt_caption">
                    <h2 class="ft-medium mb-4">{{ $about->title }}</h2>
                    <p class="mb-4">{{ $about->description }}</p>

                </div>
            </div>

        </div>
    </div>
</section>
@endforeach

@foreach ($abouts->chunk(ceil($abouts->count() / 2))[1] as $about)
<section class="middle">
    <div class="container">
        <div class="row align-items-center justify-content-between">

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="abt_caption">
                    <h2 class="ft-medium mb-4">{{ $about->title }}</h2>
                    <p class="mb-4">{{ $about->description }}</p>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="abt_caption">
                    <img src="{{ asset('uplode/about') }}/{{ $about->image }}" class="img-fluid rounded" alt="" />
                </div>
            </div>

        </div>
    </div>
</section>
@endforeach
<!-- ======================= About Us End ======================== -->
@endsection
