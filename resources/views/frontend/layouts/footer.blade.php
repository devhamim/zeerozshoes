<footer class="footer">

    <div class="footer-top section">
      <div class="container">

        <div class="footer-brand">

          <a href="#" class="logo">
            <img src="{{ asset('uplode/logo') }}/{{ $settings->first()->logo }}" width="160" height="50" alt="Footcap logo">
          </a>

          <ul class="social-list">

            <li>
              <a href="{{ $settings->first()->facebook }}" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="{{ $settings->first()->twitter }}" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="{{ $settings->first()->instragram }}" class="social-link">
                <ion-icon name="logo-pinterest"></ion-icon>
              </a>
            </li>

            <li>
              <a href="{{ $settings->first()->linkedin }}" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

        <div class="footer-link-box">

          <ul class="footer-list">

            <li>
              <p class="footer-list-title">Contact Us</p>
            </li>

            <li>
              <address class="footer-link">
                <ion-icon name="location"></ion-icon>

                <span class="footer-link-text">
                  {{ $settings->first()->address }}
                </span>
              </address>
            </li>

            <li>
              <a  class="footer-link">
                <ion-icon name="call"></ion-icon>

                <span class="footer-link-text">{{ $settings->first()->phone }}</span>
              </a>
            </li>

            <li>
              <a class="footer-link">
                <ion-icon name="mail"></ion-icon>

                <span class="footer-link-text">{{ $settings->first()->email }}</span>
              </a>
            </li>

          </ul>

          <ul class="footer-list">

            <li>
              <p class="footer-list-title">Pages</p>
            </li>

            <li>
              <a href="{{ route('category-list') }}" class="footer-link">
                <ion-icon name="chevron-forward-outline"></ion-icon>

                <span class="footer-link-text">Category</span>
              </a>
            </li>

            <li>
              <a href="{{ route('card') }}" class="footer-link">
                <ion-icon name="chevron-forward-outline"></ion-icon>

                <span class="footer-link-text">View Cart</span>
              </a>
            </li>

            <li>
              <a href="{{ route('contact') }}" class="footer-link">
                <ion-icon name="chevron-forward-outline"></ion-icon>

                <span class="footer-link-text">Contact</span>
              </a>
            </li>

            <li>
              <a href="{{ route('shop') }}" class="footer-link">
                <ion-icon name="chevron-forward-outline"></ion-icon>

                <span class="footer-link-text">New Products</span>
              </a>
            </li>

          </ul>

          <div class="footer-list">

            <p class="footer-list-title">Opening Time</p>

            <table class="footer-table">
              <tbody>

                <tr class="table-row">
                  <th class="table-head" scope="row">Mon - Tue:</th>

                  <td class="table-data">8AM - 10PM</td>
                </tr>

                <tr class="table-row">
                  <th class="table-head" scope="row">Wed:</th>

                  <td class="table-data">8AM - 7PM</td>
                </tr>

                <tr class="table-row">
                  <th class="table-head" scope="row">Fri:</th>

                  <td class="table-data">7AM - 12PM</td>
                </tr>

                <tr class="table-row">
                  <th class="table-head" scope="row">Sat:</th>

                  <td class="table-data">9AM - 8PM</td>
                </tr>

                <tr class="table-row">
                  <th class="table-head" scope="row">Sun:</th>

                  <td class="table-data">Closed</td>
                </tr>

              </tbody>
            </table>

          </div>

          <div class="footer-list">

            <p class="footer-list-title">Newsletter</p>

            <p class="newsletter-text">
              Authoritatively morph 24/7 potentialities with error-free partnerships.
            </p>

            {{-- <form action="" class="newsletter-form">
              <input type="email" name="email" required placeholder="Email Address" class="newsletter-input">

              <button type="submit" class="btn btn-primary">Subscribe</button>
            </form> --}}

          </div>

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          {{ $settings->first()->footer }}
        </p>

      </div>
    </div>

  </footer>


  <!-- Log In Modal -->
  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
    <div class="modal-dialog modal-xl login-pop-form" role="document">
      <div class="modal-content" id="loginmodal">
        <div class="modal-headers">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="ti-close"></span>
          </button>
          </div>

        <div class="modal-body p-5">
          <div class="text-center mb-4">
            <h2 class="m-0 ft-regular">Login</h2>
          </div>

          <form>
            <div class="form-group">
              <label>User Name</label>
              <input type="text" class="form-control" placeholder="Username*">
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Password*">
            </div>

            <div class="form-group">
              <div class="d-flex align-items-center justify-content-between">
                <div class="flex-1">
                  <input id="dd" class="checkbox-custom" name="dd" type="checkbox">
                  <label for="dd" class="checkbox-custom-label">Remember Me</label>
                </div>
                <div class="eltio_k2">
                  <a href="#">Lost Your Password?</a>
                </div>
              </div>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-md full-width bg-dark text-light fs-md ft-medium">Login</button>
            </div>

            <div class="form-group text-center mb-0">
              <p class="extra">Not a member?<a href="#et-register-wrap" class="text-dark"> Register</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal -->

  <!-- Search -->
  <div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="Search">
    <div class="rightMenu-scroll">
      <div class="d-flex align-items-center justify-content-between slide-head py-3 px-3">
        <h4 class="cart_heading fs-md ft-medium mb-0">Search Products</h4>
        <button onclick="closeSearch()" class="close_slide"><i class="ti-close"></i></button>
      </div>

      <div class="cart_action px-3 py-4">
        <form class="form m-0 p-0">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Product Keyword.." />
          </div>

          <div class="form-group mb-0">
            <button type="button" class="btn d-block full-width btn-dark">Search Product</button>
          </div>
        </form>
      </div>


    </div>
  </div>

  <!-- Wishlist -->
  <div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="Wishlist">
    <div class="rightMenu-scroll">
      <div class="d-flex align-items-center justify-content-between slide-head py-3 px-3">
        <h4 class="cart_heading fs-md ft-medium mb-0">Wish list</h4>
        <button onclick="closeWishlist()" class="close_slide"><i class="ti-close"></i></button>
      </div>
      <div class="right-ch-sideBar">

        <div class="cart_select_items py-2">
            @php
                $subtotal = 0;
            @endphp
          <!-- Single Item -->
          @foreach ($wishs as $wish)
          <div class="d-flex align-items-center justify-content-between br-bottom px-3 py-3">
            <div class="cart_single d-flex align-items-center">
              <div class="cart_selected_single_thumb">
                <a href="#"><img src="{{ asset('uplode/product') }}/{{ $wish->rel_to_pro->thumbnail }}" width="60" class="img-fluid" alt="" /></a>
              </div>
              <div class="cart_single_caption pl-2">
                <h4 class="product_title fs-sm ft-medium mb-0 lh-1">{{ $wish->rel_to_pro->title }}</h4>
                <h4 class="fs-md ft-medium mb-0 lh-1">{{ number_format($wish->rel_to_pro->total_price) }} Tk {{ $wish->quantity }}</h4>
              </div>
            </div>
            <div class="fls_last"><a href="{{ route('wish.remove', $wish->id) }}" class="close_slide gray"><i class="ti-close"></i></a></div>
          </div>
          @php
              $subtotal += $wish->rel_to_pro->total_price*$wish->quantity;
          @endphp
          @endforeach

        </div>

        <div class="d-flex align-items-center justify-content-between br-top br-bottom px-3 py-3">
          <h6 class="mb-0">Subtotal</h6>
          <h3 class="mb-0 ft-medium">{{ number_format($subtotal) }} Tk</h3>
        </div>

        <div class="cart_action px-3 py-3">
          <div class="form-group">
            <a href="{{ route('card') }}" class="btn d-block full-width btn-dark-light">View Card</a>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Cart -->
  <div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="Cart">
    <div class="rightMenu-scroll">
      <div class="d-flex align-items-center justify-content-between slide-head py-3 px-3">
        <h4 class="cart_heading fs-md ft-medium mb-0">Products List</h4>
        <button onclick="closeCart()" class="close_slide"><i class="ti-close"></i></button>
      </div>
      <div class="right-ch-sideBar">

        <div class="cart_select_items py-2">
            @php
                $subtotal = 0;
            @endphp
          <!-- Single Item -->
          @foreach ($cards as $card)
          <div class="d-flex align-items-center justify-content-between br-bottom px-3 py-3">
            <div class="cart_single d-flex align-items-center">
              <div class="cart_selected_single_thumb">
                <a href="#"><img src="{{ asset('uplode/product') }}/{{ $card->rel_to_pro->thumbnail }}" width="60" class="img-fluid" alt="" /></a>
              </div>
              <div class="cart_single_caption pl-2">
                <h4 class="product_title fs-sm ft-medium mb-0 lh-1">{{ $card->rel_to_pro->title }}</h4>
                <p class="mb-2"><span class="text-dark ft-medium ">{{ $card->rel_to_size->name }}</span>, <span class="text-dark ">{{ $card->rel_to_color->name }}</span></p>
                <h4 class="fs-md ft-medium mb-0 lh-1">{{ number_format($card->rel_to_pro->total_price) }} Tk X {{ $card->quantity }}</h4>
              </div>
            </div>
            <div class="fls_last"><a href="{{ route('card.remove', $card->id) }}" class="close_slide gray"><i class="ti-close"></i></a></div>
          </div>
          @php
              $subtotal += $card->rel_to_pro->total_price*$card->quantity;
          @endphp
          @endforeach

        </div>

        <div class="d-flex align-items-center justify-content-between br-top br-bottom px-3 py-3">
          <h6 class="mb-0">Subtotal</h6>
          <h3 class="mb-0 ft-medium">{{ number_format($subtotal) }} Tk</h3>
        </div>

        <div class="cart_action px-3 py-3">
          <div class="form-group">
            <a href="{{ route('card') }}" class="btn d-block full-width btn-dark-light">View Card</a>
          </div>
        </div>

      </div>
    </div>
  </div>
