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
<div class="page-content mt-3">
    <div class="checkout">
        <div class="container">

            @if (isset($cart_data))
            @if(Cookie::get('shopping_cart'))
            @php
                $total = 0
            @endphp
            <form action="{{route('order.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-5">
                        <h2 class="checkout-title">কাস্টমার ইনফরমেশন</h2><!-- End .checkout-title -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>আপনার নাম *</label>
                                    <input type="text" name="name" class="form-control" required="" value="{{ old('name') }}">
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-lg-12">
                                    <label>আপনার মোবাইল *</label>
                                    <input type="tel" name="mobile" class="form-control" required="" value="{{ old('mobile') }}">
                                    @error('mobile')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>আপনার ঠিকানা *</label>
                                    <input type="text" name="address" class="form-control" required="" value="{{ old('address') }}">
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">অর্ডার কনফার্ম করুন</span>
                                        <span class="btn-hover-text">অর্ডার কনফার্ম করুন</span>
                                    </button>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-7">
                        <div class="summary">

                            <h3 class="summary-title">অর্ডার ইনফরমেশন</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($cart_data as $data)
                                    <tr>
                                        <td><a href="{{ route('product.details', $data['item_slug']) }}">{{ urldecode($data['item_name']) }}</a></td>
                                        <td>
                                            ৳ <span class="product-price" style="display: inline">
                                                {{ isset($data['item_price']) ? $data['item_price'] : $data['product_price'] }}
                                            </span> X
                                        </td>
                                        <td class="ps-3 text-center mt-2" style="padding-top: 15px; justify-content: center; width: 15%; margin: 0 auto">
                                            <input type="number" name="quantity[{{ $data['item_id'] }}]" class="qty-input form-control mx-2" value="{{ $data['item_quantity'] }}" min="1" max="100" step="1" data-decimals="0" required>
                                        </td>
                                        <td>
                                            <div class="cart-product-quantity">
                                                <input type="hidden" class="product-id" value="{{ $data['item_id'] }}">
                                                <span class="subtotal">৳ {{ ($data['item_quantity'] ?? 1) * ($data['item_price'] ?? $data['product_price']) }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        if ($data['item_price'] != null) {
                                            $total = $total + ($data["item_quantity"] * $data["item_price"]);
                                        } else {
                                            $total = $total + ($data["item_quantity"] * $data["product_price"]);
                                        }
                                    @endphp

                                    @endforeach

                                    <tr class="summary-total">
                                        <td>Subtotal:</td>
                                        <td></td>
                                        <td></td>
                                        <td class="grand_total_price">৳ {{$total}}</td>
                                        {{-- <td><span class="grandtotal_price">৳ {{number_format($total, 0)}}</span></td> --}}
                                    </tr>
                                    <input type="hidden" name="sub_total" value="{{ $total }}">
                                    <input type="hidden" name="total" value="{{ $total }}">
                                    @foreach ($shipping_methods as $shipping)
                                        <tr class="summary-shipping-row">
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" name="charge" id="standart-shipping{{ $shipping->id }}" checked="" class="custom-control-input" value="{{ $shipping->amount }}">
                                                    <label class="custom-control-label" for="standart-shipping{{ $shipping->id }}">{{ $shipping->text }}</label>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>৳ {{ $shipping->amount }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table><!-- End .table table-summary -->
                            <div class="cart-bottom mt-3">
                                <button type="button" class="btn  btn-danger clear_cart"><span>CLEAR CART</span><i class="icon-refresh"></i></button>
                            </div>
                        </div><!-- End .summary -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </form>
            @endif
            @else
            <h2 class="text-danger m-auto text-center mt-5">No product added for checkout</h2>
            @endif


        </div><!-- End .container -->
    </div><!-- End .checkout -->
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


@section('footer_script')
<script>
   $(document).ready(function () {
    $(".qty-input").on("change", function () {
        var $row = $(this).closest("tr");
        var quantity = parseInt($(this).val());
        var price = parseFloat($row.find(".product-price").text().replace('৳ ', '')); // Extract and parse the product price
        var subtotal = quantity * price;

        $row.find(".subtotal").text("৳ " + subtotal);

        // Update the total price and any other calculations if needed
        updateTotalPrice();
    });

    function updateTotalPrice() {
        var totalPrice = 0;
        $(".subtotal").each(function () {
            var subtotal = parseFloat($(this).text().replace('৳ ', ''));
            totalPrice += subtotal;
        });

        // Update the total price in your summary
        $(".grand_total_price").text("৳ " + totalPrice);
    }
});

function removeProduct(button) {
    // Get the parent <tr> element and remove it
    var row = button.closest('tr');
    row.remove();
}
</script>
    <script>
        $('.apply_coupon_btn').click(function(e) {
            e.preventDefault();
            var coupon_code = $('.coupon_code').val();
            // alert(coupon_code);
            // console.log(coupon_code);
            // die();


            if($.trim(coupon_code).length == 0) {
                error_coupon = "Please enter valid coupon";
                $('#error_coupon').text(error_coupon);

            } else {
                error_coupon = '';
                $('#error_coupon').text(error_coupon);
            }


            if(error_coupon != '') {
                return false;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "/check-coupon-code",
                data: {
                    'coupon_code': coupon_code
                },
                success: function(response) {
                    if(response.error_status == 'error') {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(response.status);
                        $('.coupon_code').val('');
                    } else {
                        $('.grand_total_price').text(response.grand_total_price);
                        $('.discount_price').text(response.discount_price);
                        $('.coupon_code').text(response.coupon_code);
                    }
                }
            })
        })
    </script>
@endsection
