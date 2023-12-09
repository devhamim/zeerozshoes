<div class="container quickView-container">
	<div class="quickView-content">
        <div class="product_data">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="row">
                        <div class="product-left">
                            @foreach ($product_gallery as $li=>$image)
                            <a href="#image{{$li+1}}" class="carousel-dot {{$li == 0 ? 'active': ''}}">
                                <img src="{{asset('uploads/products/gallery')}}/{{$image->gallery_image}}">
                            </a>
                            @endforeach
                        </div>
                        <div class="product-right">
                            <div class="owl-carousel owl-theme owl-nav-inside owl-light mb-0" data-toggle="owl" data-owl-options='{
                                "dots": false,
                                "nav": false, 
                                "URLhashListener": true,
                                "responsive": {
                                    "900": {
                                        "nav": true,
                                        "dots": true
                                    }
                                }
                            }'>
                            @foreach ($product_gallery as $sl=>$gallery)
                                <div class="intro-slide" data-hash="image{{$sl+1}}">
                                    <img src="{{asset('uploads/products/gallery')}}/{{$gallery->gallery_image}}" alt="Image Desc">
                                    <a href="{{asset('uploads/products/gallery')}}/{{$gallery->gallery_image}}" class="btn-fullscreen">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-5 col-md-6">
                    <h2 class="product-title">{{$product->product_name}}</h2>
                    
                    @if ($product->product_discount != null)
                        <h3 class="new-price">৳ {{$product->after_discount}}</h3>
                        <h4 class="old-price" style="text-decoration: line-through">Was ৳ {{$product->product_price}}</h4>
                    @else
                        <h3 class="product-price">৳ {{$product->after_discount}}</h3>
                    @endif
                    <form action="{{route('quick.buy.store')}}" method="POST">
                        @csrf
                        <div class="details-filter-row details-row-size">
                            <label for="color">Color:</label>
                            <input type="hidden" name="product_id" class="product_id" value="{{$product->id}}">
                            <div class="select-custom">
                                <select name="color" class="form-control colorId color_id" onchange="changecolor()">
                                    <option value="">Select a color</option>
                                    @foreach ($colors as $color)
                                    <option value="{{$color->color_id}}">{{$color->color_id == 0 ? 'No color': $color->rel_to_color->color_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="details-filter-row details-row-size">
                            <label for="size">Size:</label>
                            <div class="select-custom" >
                                <select name="size" class="form-control size_id" id="sizeId">
                                    <option value="">Select a size</option>
                                    @foreach ($sizes as $size)
                                    <option value="{{$size->size_id}}">{{$size->size_id == 0 ? 'No size': $size->rel_to_size->size_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
        
                        
                        <div class="details-filter-row details-row-size">
                            <label for="qty">Qty:</label>
                            <div class="product-details-quantity">
                                <input type="number" name="quantity" id="qty" class="form-control qty-input" value="1" min="1" max="100" step="1" data-decimals="0" required>
                                
                            </div>
                        </div>
        
                        <div class="product-details-action d-flex">
                            <button type="submit" class="btn-product btn-cart btn-buy mb-3" name="btn" value="2"><span>Buy now</span></button>
                            <button type="submit" class="btn-product btn-cart add_to_cart" name="btn" value="1" onclick="addtocart()"><span>add to cart</span></button>
                            {{-- <a type="button" class="btn btn-primary text-white" name="add" id="add" onclick="addtocart()">Add to cart</a> --}}

                        </div>
                    </form>
    
                    <div class="product-details-footer">
                        <div class="product-cat">
                            <span>Category:</span>
                            <a href="{{route('category')}}">{{$product->rel_to_category->category_name}}</a>
                        </div>
    
                        <div class="social-icons social-icons-sm">
                            <span class="social-label">Share:</span>
                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                        </div>
                    </div>
                
                </div>
               
            </div>
        </div>
		
	</div>
</div>



{{-- @section('footer_script')
<script>
    $('.show-me').click(function() {
        alert('ok');
    })
</script>
@endsection --}}