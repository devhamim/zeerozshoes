@extends('frontend.layouts.app')

@section('content')
<main>
    <article>

      <!--
        - #HERO
      -->
    <header  class="hero_main">
    <a href="{{ $banners->first()->link }}">
      <section class="section hero" style="background-image: url('{{ asset('uplode/banner') }}/{{ $banners->first()->image }}">
        <div class="container">

          
        </div>
      </section>
    </a>
  </header>

      <!--
        - #COLLECTION
      -->

      <section class="section collection">
        <div class="container">

          <ul class="collection-list has-scrollbar">

            @foreach ($categorys as $category)
            <li>
                <input id="category{{ $category->id }}" class="category_id" name="category_id" type="radio" value="{{ $category->id }}"
                @if(isset($_GET['category_id']))
                    @if($_GET['category_id'] == $category->id)
                    checked
                    @endif
                @endif
                >
                <div class="collection-card" style="background-image: url('{{ asset('uplode/category') }}/{{ $category->category_img }}')">
                    <h3 class="h4 card-title text-white">{{ $category->name }}</h3>

                    <label for="category{{ $category->id }}">
                <a  class="btn btn-primary d-flex text-white">
                  <span class="text-white">Explore All</span>

                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
            </label>
            </div>
        </li>
            @endforeach

          </ul>

        </div>
      </section>

      <!--
        - #PRODUCT
      -->

      <section class="section product">
        <div class="container">

          <h2 class="h2 section-title">Brand Products</h2>

          <div class="filter-list">
            @foreach ($brands->take(6) as $brand)
                <button class="filter-btn  active" type="button" data-filter=".{{ $brand->name }}">{{ $brand->name }}</button>
            @endforeach
          </div>

          <div class="product-list best_product">
            @foreach ($products->take(8) as $product)
            <div class="product-item mix {{ $product->rel_to_brand->name }}">
              <div class="product-card" tabindex="0">

                <figure class="card-banner">
                  <a href="{{ route('singel.product',$product->slug) }}">
                  <img src="{{ asset('uplode/product') }}/{{ $product->thumbnail }}" width="720" height="720" loading="lazy"
                    alt="Running Sneaker Shoes" class="image-contain">
                  </a>
                  <div class="card-badge">New</div>
                  <ul class="card-action-list">

                    <li class="card-action-item">
                      <form action="{{ route('add.wish') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->first()->id }}">
                        <button class="card-action-btn" aria-labelledby="card-label-2">
                          <ion-icon name="heart-outline"></ion-icon>
                        </button>

                        <div class="card-action-tooltip" id="card-label-2">Add to Whishlist</div>
                      </form>
                    </li>

                    <li class="card-action-item">
                        <a href="{{ route('singel.product',$product->slug) }}" class="card-action-tooltip" >
                        <button class="card-action-btn" >
                            <ion-icon name="eye-outline"></ion-icon>
                        </button>
                        Quick View
                        </a>
                    </li>

                    {{-- <li class="card-action-item">
                        <a href="https://api.whatsapp.com/send?phone=PHONE_NUMBER&text={{ urlencode($product->title) }}&amp;url={{ urlencode(route('singel.product',$products->first()->slug)) }}" target="_blank">
                        <button class="card-action-btn" aria-labelledby="card-label-4">
                            <ion-icon name="repeat-outline"></ion-icon>
                        </button>

                        <div class="card-action-tooltip" id="card-label-4">
                            Share on WhatsApp
                        </div>
                        </a>
                    </li> --}}

                  </ul>
                </figure>

                <div class="card-content">

                  <div class="card-cat">
                    <a href="#" class="card-cat-link">{{ $product->rel_to_cat->name }}</a> /
                    <a href="#" class="card-cat-link">{{ $product->rel_to_subcat->name }}</a>
                  </div>

                  <h3 class="h3 card-title">
                    <a href="{{ route('singel.product',$product->slug) }}">{{ $product->title }}</a>
                  </h3>

                  <data class="card-price" >{{ $product->price }}Tk</data>

                </div>

              </div>
            </div>
            @endforeach
          </div>

        </div>
      </section>

      <!--
        - #CTA
      -->

      <section class="section cta">
        <div class="container">

          <ul class="cta-list">

            @foreach ($adbanner->take(2) as $ad)
            <li>
            <a href="{{ $ad->link }}">
              <div class="cta-card" style="background-image: url('{{ asset('uplode/adbanner') }}/{{ $ad->image }}')">
                <p class="card-subtitle py-3"></p>

                <h3 class="h2 card-title py-5"></h3>
                </a>
              </div>
            </a>
            </li>
            @endforeach
          </ul>

        </div>
      </section>

      <!--
        - #SPECIAL
      -->

      <section class="section special">
        <div class="container">
          @foreach ($products->take(1) as $product)
          <div class="special-banner" style="background-image: url('{{ asset('uplode/product') }}/{{ $product->thumbnail }}')">
            <h2 class="h3 banner-title">Recent Product</h2>

            <a href="{{ route('shop') }}" class="btn btn-link d-flex">
              <span>Explore All</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>
          </div>
          @endforeach
          <div class="special-product">
            <h2 class="h2 section-title">
              <span class="text">Recent Product</span>
              
              <span class="line"></span>
            </h2>
            <ul class="has-scrollbar">
              @foreach ($products->skip(1)->take(10) as $product)
              <li class="product-item">
                <div class="product-card" tabindex="0">

                  <figure class="card-banner">
                    <a href="{{ route('singel.product',$product->slug) }}">
                      <img src="{{ asset('uplode/product') }}/{{ $product->thumbnail }}" width="720" height="720" loading="lazy"
                        alt="Running Sneaker Shoes" class="image-contain">
                      </a>
                    <ul class="card-action-list">

                      <li class="card-action-item">
                        <form action="{{ route('add.wish') }}" method="POST">
                          @csrf
                          <input type="hidden" name="product_id" value="{{ $product->first()->id }}">
                          <button class="card-action-btn" aria-labelledby="card-label-2">
                            <ion-icon name="heart-outline"></ion-icon>
                          </button>

                          <div class="card-action-tooltip" id="card-label-2">Add to Whishlist</div>
                        </form>
                      </li>

                      <li class="card-action-item">
                        <a href="{{ route('singel.product',$product->slug) }}" class="card-action-tooltip" >
                        <button class="card-action-btn" >
                            <ion-icon name="eye-outline"></ion-icon>
                        </button>
                        Quick View
                        </a>
                    </li>

                    </ul>
                  </figure>

                  <div class="card-content">

                    <div class="card-cat">
                      <a  class="card-cat-link">{{ $product->rel_to_cat->name }}</a> /
                      <a  class="card-cat-link">{{ $product->rel_to_subcat->name }}</a>
                    </div>

                    <h3 class="h3 card-title">
                      <a href="{{ route('singel.product',$product->slug) }}">{{ $product->name }}</a>
                    </h3>

                    <data class="card-price">{{ $product->total_price }}Tk</data>

                  </div>

                </div>
              </li>

              @endforeach
            </ul>
          </div>
        </div>
      </section>





      <!--
        - #SERVICE
      -->

      <section class="section service">
        <div class="container">

          <ul class="service-list">

            <li class="service-item">
              <div class="service-card">

                <div class="card-icon">
                  <img src="{{ asset('frontend') }}/assets/images/service-1.png" width="53" height="28" loading="lazy" alt="Service icon">
                </div>

                <div>
                  <h3 class="h4 card-title">Free Shiping</h3>

                  <p class="card-text">
                    All orders over <span>2000Tk</span>
                  </p>
                </div>

              </div>
            </li>

            <li class="service-item">
              <div class="service-card">

                <div class="card-icon">
                  <img src="{{ asset('frontend') }}/assets/images/service-2.png" width="43" height="35" loading="lazy" alt="Service icon">
                </div>

                <div>
                  <h3 class="h4 card-title">Quick Payment</h3>

                  <p class="card-text">
                    100% secure payment
                  </p>
                </div>

              </div>
            </li>

            <li class="service-item">
              <div class="service-card">

                <div class="card-icon">
                  <img src="{{ asset('frontend') }}/assets/images/service-3.png" width="40" height="40" loading="lazy" alt="Service icon">
                </div>

                <div>
                  <h3 class="h4 card-title">Free Returns</h3>

                  <p class="card-text">
                    Money back in 30 days
                  </p>
                </div>

              </div>
            </li>

            <li class="service-item">
              <div class="service-card">

                <div class="card-icon">
                  <img src="{{ asset('frontend') }}/assets/images/service-4.png" width="40" height="40" loading="lazy" alt="Service icon">
                </div>

                <div>
                  <h3 class="h4 card-title">24/7 Support</h3>

                  <p class="card-text">
                    Get Quick Support
                  </p>
                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>


      <!--
        - #INSTA POST
      -->

      <section class="section insta-post">

        <ul class="insta-post-list has-scrollbar">

          <li class="insta-post-item">
            <img src="{{ asset('frontend') }}/assets/images/insta-1.jpg" width="100" height="100" loading="lazy" alt="Instagram post"
              class="insta-post-banner image-contain">

            <a  class="insta-post-link">
            </a>
          </li>

          <li class="insta-post-item">
            <img src="{{ asset('frontend') }}/assets/images/insta-2.jpg" width="100" height="100" loading="lazy" alt="Instagram post"
              class="insta-post-banner image-contain">

            <a  class="insta-post-link">

            </a>
          </li>

          <li class="insta-post-item">
            <img src="{{ asset('frontend') }}/assets/images/insta-3.jpg" width="100" height="100" loading="lazy" alt="Instagram post"
              class="insta-post-banner image-contain">

            <a  class="insta-post-link">
            </a>
          </li>

          <li class="insta-post-item">
            <img src="{{ asset('frontend') }}/assets/images/insta-4.jpg" width="100" height="100" loading="lazy" alt="Instagram post"
              class="insta-post-banner image-contain">

            <a  class="insta-post-link">
            </a>
          </li>

          <li class="insta-post-item">
            <img src="{{ asset('frontend') }}/assets/images/insta-5.jpg" width="100" height="100" loading="lazy" alt="Instagram post"
              class="insta-post-banner image-contain">

            <a  class="insta-post-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li class="insta-post-item">
            <img src="{{ asset('frontend') }}/assets/images/insta-6.jpg" width="100" height="100" loading="lazy" alt="Instagram post"
              class="insta-post-banner image-contain">

            <a  class="insta-post-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li class="insta-post-item">
            <img src="{{ asset('frontend') }}/assets/images/insta-7.jpg" width="100" height="100" loading="lazy" alt="Instagram post"
              class="insta-post-banner image-contain">

            <a class="insta-post-link">
            </a>
          </li>

          <li class="insta-post-item">
            <img src="{{ asset('frontend') }}/assets/images/insta-8.jpg" width="100" height="100" loading="lazy" alt="Instagram post"
              class="insta-post-banner image-contain">

            <a class="insta-post-link">

            </a>
          </li>

        </ul>

      </section>

    </article>
  </main>
@endsection

@section('footer_script')
    <script>
        var mixer = mixitup('.best_product');
    </script>
@endsection
