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
    <div id="shopify-section-about-template" class="shopify-section"><!-- about-template.liquid -->

        <style data-shopify>
            .content_1566459467440 {
                margin-top: 0;
                margin-bottom: 0;
                padding: 4.5rem 0;
            }
        </style>
        <div class="container" data-block="item_banner">
            <div class="content_1566459467440 bg-image lazyload" style="background: url({{ asset('frontend/assets/images/about-header-bg.jpg') }})">
                <div class="section-width w-100">
                    <div class="text-content text-center">
                        <h2 class="text-white">About us<span>Who we are</span></h2>
                    </div>
                </div>
            </div>
            <div class="section-width w-100">
                <div class="row mt-5">
                    <div class="col-12 col-md-6">
                        <h2 class="title">Our Vision</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit.
                            Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id,
                            mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor
                            libero sodales leo, eget blandit nunc tortor eu nibh.</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <h2 class="title">Our Mission</h2>
                        <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus
                            libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida
                            id, est. Sed lectus. <br>Praesent elementum hendrerit tortor. Sed semper lorem
                            at felis.</p>
                    </div>
                </div>
            </div>
        </div>
        <style data-shopify>
            .content_1566459607551 {
                margin-top: 5rem;
                margin-bottom: 0;
                padding: 5rem 0;
                background-color: #f9f9f9;
            }
        </style>
        <div class="w-100" data-block="item_who_we_are">
            <div class="content_1566459607551">
                <div class="section-width container">
                    <div class="row">
                        <div class="col-lg-5">
                            <h2 class="title">Who We Are</h2>
                            <p class="lead text-primary mb-3">Pellentesque odio nisi, euismod pharetra a
                                ultricies <br>in diam. Sed arcu. Cras consequat</p>
                            <p class="mb-2">Sed pretium, ligula sollicitudin laoreet viverra, tortor
                                libero sodales leo, eget blandit nunc tortor eu nibh. Suspendisse potenti.
                                Sed egestas, ante et vulputate volutpat, uctus metus libero eu augue. </p>

                            {{-- <a href="#" class="btn btn-sm btn-minwidth btn-outline-primary-2">
                                <span>VIEW OUR NEWS</span><i class="fkt-long-arrow-right"></i>
                            </a> --}}

                        </div>
                        <div class="col-lg-6 offset-lg-1">
                            <div class="about-images">
                                <div class="img__banner lazyload"
                                style="padding-bottom: 64.28571428571429%; background: url({{ asset('frontend/assets/images/about/img-1.jpg') }})">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <style data-shopify>
            .content_1566460432072 {
                margin-top: 0;
                margin-bottom: 0;
                padding: 0;
            }
        </style>

        <style data-shopify>
            .content_1566460593227 {
                margin-top: 0;
                margin-bottom: 0;
                padding: 6rem 0;
                background-color: #f9f9f9;
            }
        </style>

        <style>
            [data-block="item_banner"] .text-content {
                min-height: 354px;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
            }

            [data-block="item_banner"] .text-content h2 {
                font-weight: 400;
                letter-spacing: -.025em;
                margin-bottom: 0;
            }

            [data-block="item_banner"] .text-content h2 span {
                display: block;
                font-size: 1.6rem;
                margin-top: .4rem;
                letter-spacing: 0;
            }

            .brands-text {
                max-width: 430px;
                margin-top: 2.5rem;
                margin-bottom: 3rem;
            }

            .brand {
                display: block;
                margin-bottom: 1rem;
            }

            .member {
                margin-bottom: 2rem;
                max-width: 376px;
                margin-left: auto;
                margin-right: auto;
            }

            .member p {
                max-width: 240px;
            }

            .member.text-center p {
                margin-left: auto;
                margin-right: auto;
            }

            .member.text-center .social-icons {
                justify-content: center;
            }

            .member-media {
                position: relative;
                margin: 0;
            }

            .member-content {
                padding-top: 2.4rem;
                padding-bottom: 2.4rem;
                overflow: hidden;
            }

            .member-title {
                font-weight: 400;
                font-size: 1.6rem;
                letter-spacing: 0;
                margin-bottom: 0;
            }

            .member-title span {
                display: block;
                color: #999999;
                font-weight: 300;
                font-size: 1.4rem;
                margin-top: 0.3rem;
            }

            .member-overlay {
                position: absolute;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: rgba(102, 102, 102, 0.7);
                color: #fff;
                opacity: 0;
                visibility: hidden;
                overflow: hidden;
            }

            .member-overlay .member-title {
                color: inherit;
                margin-bottom: 1.5rem;
            }

            .member-overlay .member-title span {
                color: #ebebeb;
            }

            .member-overlay .social-icons {
                margin-top: 2.7rem;
            }

            .member-overlay .social-icon {
                font-size: 1.5rem;
            }

            .member-overlay .social-icon+.social-icon {
                margin-left: 2.8rem;
            }

            .member-overlay .social-icon:not(:hover) {
                color: inherit;
            }

            .member-content,
            .member-overlay {
                transition: all 0.45s ease;
            }

            .member:hover .member-content {
                opacity: 0;
            }

            .member:hover .member-overlay {
                visibility: visible;
                opacity: 1;
            }

            .member:hover.member-anim .member-overlay .member-title,
            .member:hover.member-anim .member-overlay p,
            .member:hover.member-anim .member-overlay .social-icons {
                animation-name: fadeInUpShort;
                animation-duration: 0.65s;
                animation-fill-mode: both;
            }

            .member:hover.member-anim .member-overlay p {
                animation-delay: 0.1s;
            }

            .member:hover.member-anim .member-overlay .social-icons {
                animation-delay: 0.2s;
            }

            .member:hover.member-anim .member-content .member-title {
                animation-name: fadeOutUpShort;
                animation-duration: 0.65s;
                animation-fill-mode: both;
            }

            @keyframes fadeInUpShort {
                from {
                    opacity: 0;
                    -webkit-transform: translate3d(0, 100px, 0);
                    transform: translate3d(0, 100px, 0);
                }

                to {
                    opacity: 1;
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                }
            }

            @keyframes fadeOutUpShort {
                from {
                    opacity: 1;
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                }

                to {
                    opacity: 0;
                    -webkit-transform: translate3d(0, -100px, 0);
                    transform: translate3d(0, -100px, 0);
                }
            }

            .about-testimonials blockquote {
                color: #666666;
                max-width: 850px;
                margin-left: auto;
                margin-right: auto;
                font-style: normal;
                line-height: 1.875;
            }
        </style>
    </div>
</div>

        

@endsection
