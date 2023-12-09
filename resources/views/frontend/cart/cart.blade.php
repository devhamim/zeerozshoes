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
    <div class="cart">
        @if (isset($cart_data))
        <div class="container">
            <div class="row">
                @php $total="0" @endphp
                    @if (Cookie::get('shopping_cart'))
                        <div class="col-lg-9">
                            <table class="table table-cart table-mobile">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($cart_data as $data)
                                    <tr class="cartpage">
                                        <td class="product-col">
                                            <div class="product">
                                                <figure class="product-media">
                                                    <a href="">
                                                        <img src="{{ asset('uploads/products/preview/'.$data['item_image']) }}" alt="Product image">
                                                    </a>
                                                </figure>

                                                <h3 class="product-title">
                                                    <a href="{{route('product.details', $data['item_slug'])}}">{{$data['item_name']}}</a>
                                                </h3><!-- End .product-title -->
                                            </div><!-- End .product -->
                                        </td>
                                        <td class="price-col">৳ {{ number_format($data['item_price'], 2) }}</td>
                                        <td class="quantity-col">
                                            <div class="cart-product-quantity">
                                                <input type="number" class="qty-input form-control" value="{{ $data['item_quantity'] }}" min="1" max="100" step="1" data-decimals="0" required>
                                                <input type="hidden" class="product_id" value="{{ $data['item_id'] }}" >
                                            </div>
                                        </td>
                                        <td class="total-col">৳ {{ number_format($data['item_quantity'] * $data['item_price'], 2) }}</td>
                                        <td class="remove-col delete_cart_data"><button class="btn-remove"><i class="icon-close"></i></button></td>
                                    </tr>
                                    @php $total = $total + ($data['item_quantity'] * $data['item_price']) @endphp
                                    @endforeach
                                </tbody>
                            </table><!-- End .table table-wishlist -->

                            <div class="cart-bottom">
                                <div class="cart-discount">
                                </div>
                                <button type="button" class="btn btn-outline-dark-2 clear_cart"><span>CLEAR CART</span><i class="icon-refresh"></i></button>
                            </form>
                            </div><!-- End .cart-bottom -->
                        </div>
                    @endif
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->
    
                                <table class="table table-summary" id="totalajaxcall">
                                    <tbody class="totalpricingload">
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>৳ {{number_format($total, 2)}}</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>৳ {{number_format($total, 2)}}</td>
                                        </tr>
                                    </tbody>
                                </table>
    
                            <a href="{{route('checkout')}}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                        </div><!-- End .summary -->
    
                        <a href="{{route('shop')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                    </aside>
                
                
                
            </div><!-- End .row -->
        </div><!-- End .container -->
        @else
        <h3 class="text-danger m-auto text-center mt-5 pt-5">No product has been added in cart.</h3>
        @endif
    </div>
</div>
@endsection

@section('mobile')
<ul class="mobile-cats-menu">
    @foreach ($categories as $category)
    <li><a href="{{route('category', $category->id)}}">{{$category->category_name}}</a></li>
    @endforeach
    <li><a href="{{route('category')}}">All</a></li>
</ul>
@endsection