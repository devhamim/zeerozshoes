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
<hr class="mt-4 mb-5">
<div class="page-content pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mb-2 mb-lg-0">
                <h2 class="title mb-1">Contact Information</h2>
                @if($setting->first()->about != null)
                    <p class="mb-3 pr-3">{{ $setting->first()->about  }}</p>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="contact-info">
                            <ul class="contact-list">
                                <li>
                                    <i class="icon-map-marker"></i>
                                    @if($setting->first()->settings != null)
                                        {{ $setting->first()->settings }}
                                    @endif
                                </li>
                                <li>
                                    <i class="icon-phone"></i>
                                    @if($setting->first()->phone != null)
                                    <a href="tel:{{ $setting->first()->phone }}">{{ $setting->first()->phone }}</a>
                                    @endif
                                </li>
                                <li>
                                    <i class="icon-envelope"></i>
                                    @if($setting->first()->email != null)
                                        <a href="mailto:{{ $setting->first()->email }}">{{ $setting->first()->email }}</a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-12">
                        <div class="contact-info">
                                <span class="float-left mr-5" style="font-size: 18px">Social: </span>
                                <a href="#" class="mr-3" style="font-size: 17px" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                <a href="#" class="mr-3" style="font-size: 17px" title="Facebook" target="_blank"><i class="icon-twitter"></i></a>
                                <a href="#" class="mr-3" style="font-size: 17px" title="Facebook" target="_blank"><i class="icon-instagram"></i></a>
                                <a href="#" class="mr-3" style="font-size: 17px" title="Facebook" target="_blank"><i class="icon-youtube"></i></a>
                                <a href="#" class="mr-3" style="font-size: 17px" title="Facebook" target="_blank"><i class="icon-pinterest"></i></a>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="col-lg-7">
                <h2 class="title mb-1">Got Any Questions?</h2>
                <p class="mb-2">Use the form below to get in touch with the sales team</p>

                <form action="{{route('contact.message')}}" class="contact-form mb-3" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="cname" class="sr-only">Name</label>
                            <input type="text" name="name" class="form-control" id="cname" placeholder="Name *" required>
                        </div>

                        <div class="col-sm-6">
                            <label for="cemail" class="sr-only">Email</label>
                            <input type="email" name="email" class="form-control" id="cemail" placeholder="Email *" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <label for="cphone" class="sr-only">Phone</label>
                            <input type="tel" name="phone" class="form-control" id="cphone" placeholder="Phone">
                        </div>
                    </div>

                    <label for="cmessage" class="sr-only">Message</label>
                    <textarea class="form-control" name="message" cols="30" rows="4" id="cmessage" required placeholder="Message *"></textarea>

                    <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                        <span>SUBMIT</span>
                        <i class="icon-long-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>


    </div>
</div>
@endsection

@section('mobile')
<ul class="mobile-cats-menu">
    @foreach ($categories as $category)
    <li><a href="{{route('category', $category->id)}}">{{$category->category_name}}</a></li>
    @endforeach
    <li><a href="#">All</a></li>
</ul>
@endsection
