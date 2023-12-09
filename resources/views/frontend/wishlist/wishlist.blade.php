@extends('frontend.master.master')
@section('computer')

<div class="dropdown category-dropdown is-on" data-visible="true">
    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
        ক্যাটেগরীজ
    </a>
    <div class="dropdown-menu">
        <nav class="side-nav">
            <ul class="menu-vertical sf-arrows">
                @foreach ($categories->take(10) as $category)
                    <li><a href="{{route('category.one',$category->id)}}">{{$category->category_name}}</a></li>
                @endforeach
                <li><a href="{{route('category')}}">All</a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="page-content">
    <div class="container">
        <table class="table table-wishlist table-mobile" id="totalajaxcall">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Stock Status</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody class="totalpricingload">
                @if (isset($wishlist_data))
                @foreach ($wishlist_data as $data)
                <tr class="wishlistpage">
                    <td class="product-col">
                        <div class="product">
                            <figure class="product-media">
                                <a href="#">
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
                        <span class="in-quantity">{{App\Models\Inventory::where('product_id', $data['item_id'])->where('color_id', $data['item_color'])->where('size_id', $data['item_size'])->first()->quantity}}</span>
                        <input type="hidden" class="product_id" value="{{ $data['item_id'] }}" >
                        <input type="hidden" class="color_id" value="{{ $data['item_color'] }}" >
                        <input type="hidden" class="size_id" value="{{ $data['item_color'] }}" >
                    </td>
                    <td class="action-col">
                        <button type="button" class="btn btn-block btn-outline-primary-2 add_wishlist_cart"><i class="icon-cart-plus"></i>Add to Cart</button>
                    </td>
                    <td class="remove-col delete_wishlist_data"><button class="btn-remove"><i class="icon-close"></i></button></td>
                </tr>
                @endforeach
                @else
                <h3 class="text-danger m-auto text-center mt-5 pt-5">No product has been added in Wishlist.</h3>
                @endif
            </tbody>
        </table><!-- End .table table-wishlist -->
        <div class="wishlist-share d-flex justify-content-between">
            <div class="social-icons social-icons-sm mb-2">
                <label class="social-label">Share on:</label>
                <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
            </div><!-- End .soial-icons -->
            <div>
                <a href="{{route('wishlist.clear')}}" class="btn btn-danger border-0 text-center"><i class="icon-cart-plus"></i>Clear wishlist</a>
            </div>
        </div><!-- End .wishlist-share -->
    </div><!-- End .container -->
</div><!-- End .page-content -->
@endsection

@section('mobile')
<ul class="mobile-cats-menu">
    @foreach ($categories as $category)
    <li><a href="{{route('category.one',$category->id)}}">{{$category->category_name}}</a></li>
    
    @endforeach
    <li><a href="{{route('category')}}">All</a></li>
</ul>
@endsection

@section('footer_script')
    <script>
        $(document).ready(function() {
            $('.delete_wishlist_data').click(function(e) {
                e.preventDefault();
                var thisDeletearea = $(this);
                var product_id = $(this).closest(".wishlistpage").find('.product_id').val();
                var data = {
                    '_token': $('input[name=_token]').val(),
                    "product_id": product_id,
                };

                $(this).closest(".wishlistpage").remove();

                $.ajax({
                    url: '/delete-from-wishlist',
                    type: 'DELETE',
                    data: data,
                    success: function (response) {
                        $('#totalajaxcall').load(location.href + ' .totalpricingload');
                        alertify.set('notifier','position','top-right');
                        alertify.success(response.status);
                    }
                });
            })
        })
    </script>

    <script>
        $(document).ready(function() {
            $('.add_wishlist_cart').click(function(e) {
                e.preventDefault();
                var product_id = $(this).closest(".wishlistpage").find('.product_id').val();

                var data = {
                    '_token': $('input[name=_token]').val(),
                    "product_id": product_id,
                };
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "/wishlist-to-cart",
                    method: "POST",
                    data: data, 
                    success: function(response) {
                        alertify.set('notifier','position','top-right');
                        alertify.success(response.status);
                    }
                })

            })
        })
    </script>
@endsection