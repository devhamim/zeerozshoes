@extends('frontend.layouts.app')

@section('content')
<main>
    <article>

      <!--
        - #HERO
      -->

      <section class="section hero" style="background-image: url('{{ asset('frontend') }}/assets/images/hero-banner.png')">
        <div class="container">

          <h2 class="h1 hero-title">
            New Summer <strong>Shoes Collection</strong>
          </h2>

          <p class="hero-text">
            Competently expedite alternative benefits whereas leading-edge catalysts for change. Globally leverage
            existing an
            expanded array of leadership.
          </p>

          <button class="btn btn-primary d-flex">
            <span>Shop Now</span>

            <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
          </button>

        </div>
      </section>


      <!--
        - #COLLECTION
      -->

      <section class="section collection">
        <div class="container">

          <ul class="collection-list has-scrollbar">

            <li>
              <div class="collection-card" style="background-image: url('{{ asset('frontend') }}/assets/images/collection-1.jpg')">
                <h3 class="h4 card-title">Men Collections</h3>

                <a href="#" class="btn btn-secondary d-flex">
                  <span>Explore All</span>

                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
              </div>
            </li>

            <li>
              <div class="collection-card" style="background-image: url('{{ asset('frontend') }}/assets/images/collection-2.jpg')">
                <h3 class="h4 card-title">Women Collections</h3>

                <a href="#" class="btn btn-secondary d-flex">
                  <span>Explore All</span>

                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
              </div>
            </li>

            <li>
              <div class="collection-card" style="background-image: url('{{ asset('frontend') }}/assets/images/collection-3.jpg')">
                <h3 class="h4 card-title">Sports Collections</h3>

                <a href="#" class="btn btn-secondary d-flex">
                  <span>Explore All</span>

                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
              </div>
            </li>

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
                    <a href="#" class="card-cat-link">{{ $product->rel_to_cat->name }}</a>
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

            <li>
              <div class="cta-card" style="background-image: url('{{ asset('frontend') }}/assets/images/cta-1.jpg')">
                <p class="card-subtitle">Adidas Shoes</p>

                <h3 class="h2 card-title">The Summer Sale Off 50%</h3>

                <a href="#" class="btn btn-link">
                  <span>Shop Now</span>

                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
              </div>
            </li>

            <li>
              <div class="cta-card" style="background-image: url('{{ asset('frontend') }}/assets/images/cta-2.jpg')">
                <p class="card-subtitle">Nike Shoes</p>

                <h3 class="h2 card-title">Makes Yourself Keep Sporty</h3>

                <a href="#" class="btn btn-link">
                  <span>Shop Now</span>

                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
              </div>
            </li>

          </ul>

        </div>
      </section>

      <!--
        - #SPECIAL
      -->

      <section class="section special">
        <div class="container">

          <div class="special-banner" style="background-image: url('{{ asset('uplode/product') }}/{{ $product->thumbnail }}')">
            <h2 class="h3 banner-title">Recent Product</h2>

            <a href="{{ route('shop') }}" class="btn btn-link d-flex">
              <span>Explore All</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>
          </div>
          @foreach ($products->skip(1)->take(3) as $product)
          <div class="">

            <ul class="has-scrollbar">

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

                    <data class="card-price">{{ $product->total_price }}</data>

                  </div>

                </div>
              </li>

            </ul>

          </div>
          @endforeach
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
                    All orders over <span>$150</span>
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
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li class="insta-post-item">
            <img src="{{ asset('frontend') }}/assets/images/insta-2.jpg" width="100" height="100" loading="lazy" alt="Instagram post"
              class="insta-post-banner image-contain">

            <a  class="insta-post-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li class="insta-post-item">
            <img src="{{ asset('frontend') }}/assets/images/insta-3.jpg" width="100" height="100" loading="lazy" alt="Instagram post"
              class="insta-post-banner image-contain">

            <a  class="insta-post-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li class="insta-post-item">
            <img src="{{ asset('frontend') }}/assets/images/insta-4.jpg" width="100" height="100" loading="lazy" alt="Instagram post"
              class="insta-post-banner image-contain">

            <a  class="insta-post-link">
              <ion-icon name="logo-instagram"></ion-icon>
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
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li class="insta-post-item">
            <img src="{{ asset('frontend') }}/assets/images/insta-8.jpg" width="100" height="100" loading="lazy" alt="Instagram post"
              class="insta-post-banner image-contain">

            <a class="insta-post-link">
              <ion-icon name="logo-instagram"></ion-icon>
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
