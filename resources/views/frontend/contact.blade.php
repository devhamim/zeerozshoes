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
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ======================= Top Breadcrubms ======================== -->

<!-- ======================= Contact Page Detail ======================== -->
<section class="">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center">
                    <h2 class="off_title">Contact Us</h2>
                    <h3 class="ft-bold pt-3">Get In Touch</h3>
                </div>
            </div>
        </div>

        <div class="row align-items-start justify-content-between">

            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="card-wrap-body mb-4">
                    <h4 class="ft-medium mb-3 theme-cl">Address</h4>
                    <p>{{ $settings->first()->address }}</p>
                    {{-- <p class="lh-1"><span class="text-dark ft-medium">Email:</span> dhananjaypreet@gmail.com</p> --}}
                </div>

                <div class="card-wrap-body mb-3">
                    <h4 class="ft-medium mb-3 theme-cl">Make a Call</h4>
                    <h6 class="ft-medium mb-1">Customer Care:</h6>
                    <strong class="mb-2">Phone: {{ $settings->first()->phone }}</strong>
                </div>

                <div class="card-wrap-body mb-3">
                    <h4 class="ft-medium mb-3 theme-cl">Drop A Mail</h4>
                    <p>Fill out our form and we will contact you within 24 hours.</p>
                    <strong class="lh-1 text-dark">Email: {{ $settings->first()->email }}</strong>
                </div>
            </div>

            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                <form class="row" action="{{ route('customer.message') }}" method="POST">
                    @csrf
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="">Your Name *</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class=" text-dark ft-medium">Your Email *</label>
                            <input type="email" name="email" class="form-control">
                            @error('email')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="">Subject</label>
                            <input type="text" name="subject" class="form-control">
                            @error('subject')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class=" text-dark ft-medium">Message</label>
                            <textarea class="form-control ht-80" name="message"></textarea>
                            @error('message')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark">Send Message</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</section>
<!-- ======================= Contact Page End ======================== -->
@endsection