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
									<li class="breadcrumb-item"><a href="{{ route('shop') }}">Shop</a></li>
									<li class="breadcrumb-item active" aria-current="page">Data</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- ======================= Top Breadcrubms ======================== -->

			<!-- ======================= Product Detail ======================== -->
			<section class="middle">
				<div class="container">
					<div class="row">

						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
							<div class="sp-wrap">
								@foreach ($gallerys as $gallery)
									<div class="single_view_slide">
										<a href="{{ asset('uplode/product/gallery') }}/{{ $gallery->gallery }}" data-lightbox="roadtrip" class="d-block mb-4">
											<img src="{{ asset('uplode/product/gallery') }}/{{ $gallery->gallery }}" class="img-fluid rounded" alt="" />
										</a>
									</div>
								@endforeach

							</div>
						</div>

						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
							<div class="prd_details">

								<div class="prt_01 mb-2"><span class="text-success bg-light-success rounded px-2 py-1">{{ $products->first()->rel_to_brand->name }}</span></div>
								<div class="prt_02 mb-3">
									<h2 class="ft-bold mb-1">{{ $products->first()->title }}</h2>
									<div class="text-left" >
										<div class="elis_rty"><span class="ft-medium text-muted line-through fs-md mr-2 ">{{ $products->first()->price }}Tk</span><span class="ft-bold theme-cl fs-lg">{{ $products->first()->total_price }}Tk</span></div>
									</div>
								</div>

								<div class="prt_03 mb-4">
									<p>{{ $products->first()->sort_desp }}</p>
								</div>

								<div class="prt_04 mb-4">
									<p class="d-flex align-items-center mb-1">Category:<strong class="fs-sm text-dark ft-medium ml-1">{{ $products->first()->rel_to_cat->name }}, {{ $products->first()->rel_to_subcat->name }}</strong></p>
									{{-- <p class="d-flex align-items-center mb-0">SKU:<strong class="fs-sm text-dark ft-medium ml-1">KUMO42568</strong></p> --}}
								</div>
								<form action="{{ route('add.card') }}" method="POST">
									@csrf
								<div class="prt_04 mb-2">
									<p class="d-flex align-items-center mb-0 text-dark ft-medium">Color:</p>
									<div class="text-left">
										@php
											$color = null;
										@endphp
										@foreach ($available_color as $color)
											@if($color->rel_to_color->color_code != null)
												<div class="form-check form-option form-check-inline mb-1">
													<input class="form-check-input color_id" type="radio" name="color_id" id="white{{ $color->rel_to_color->id }}" value="{{ $color->color_id }}">
													<label class="form-option-label rounded-circle" for="white{{ $color->rel_to_color->id }}"><span class="form-option-color rounded-circle" style="background-color: {{ $color->rel_to_color->color_code }}"></span></label>
												</div>
											@else
												<strong class="text-danger">Not Available</strong>
												<input type="hidden" value="1" name="color_id">
											@endif

											@php
												$color = $color->rel_to_color->color_code;
											@endphp
										@endforeach
									</div>
                                    @error('color_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
								</div>

								<div class="prt_04 mb-4">
									<p class="d-flex align-items-center mb-0 text-dark ft-medium">Size:</p>
									<div class="text-left pb-0 pt-2" id="size_id">
										@if($color != null)
										@foreach ($sizes as $size)
											<div class="form-check size-option form-option form-check-inline mb-2" >
												<input class="form-check-input" type="radio" name="size_id" id="28">
												{{-- <label class="form-option-label" for="28">{{ $size->name }}</label> --}}
											</div>
										@endforeach
										@else
										@foreach (App\Models\inventory::where('product_id', $products->first()->id)->get() as $size)
											<div class="form-check size-option form-option form-check-inline mb-2" >
												<input type="hidden" value="1" name="size_id">

												<input class="form-check-input" type="radio" name="size_id" id="{{ $size->id }}" value="{{ $size->rel_to_size->id }}">
												<label class="form-option-label" for="{{ $size->id }}">{{ $size->rel_to_size->name }}</label>
											</div>
										@endforeach
										@endif
									</div>
                                    @error('size_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
								</div>
								<div class="prt_05 mb-4">
									<div class="form-row mb-7">
										<div class="col-12 col-lg-auto">
											<!-- Quantity -->
											<select class="mb-2 p-3" name="quantity">
											<option value="1" selected="">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											</select>
										</div>
										<div class="col-12 col-lg">
											<!-- Submit -->
											<input type="hidden" name="product_id" value="{{ $products->first()->id }}">
											<button type="submit" class="btn btn-block custom-height mb-2">
												<i class="lni lni-shopping-basket mr-2"></i>Add to Cart
											</button>
										</div>
									</form>
									<form action="{{ route('add.wish') }}" method="POST">
									@csrf
										<div class="col-12 col-lg-auto">
											<input type="hidden" name="product_id" value="{{ $products->first()->id }}">
											<!-- Wishlist -->
											<button type="submit" class="btn custom-height btn-default btn-block mb-2 text-dark">
												<i class="lni lni-heart mr-2"></i>Wishlist
											</button>
										</div>
									</form>
								</div>
								</div>

								<div class="prt_06">
									
								</div>

							</div>
						</div>

					</div>
				</div>
			</section>
			<!-- ======================= Product Detail End ======================== -->

			<!-- ======================= Product Description ======================= -->
			<section class="middle">
				<div class="container">
					<div class="row align-items-center justify-content-center">
						<div class="col-xl-11 col-lg-12 col-md-12 col-sm-12">
							<ul class="nav nav-tabs b-0 d-flex align-items-center justify-content-center simple_tab_links mb-4" id="myTab" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link active" id="description-tab" href="#description" data-toggle="tab" role="tab" aria-controls="description" aria-selected="true">Description</a>
								</li>

							</ul>

							<div class="tab-content" id="myTabContent">

								<!-- Description Content -->
								<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
									<div class="description_info">
										<p class="p-0 mb-2">{!! $products->first()->long_desp !!}</p>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ======================= Product Description End ==================== -->

			<!-- ======================= Similar Products Start ============================ -->
			<section class="middle pt-0">
				<div class="container">

					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center">
								<h2 class="off_title">Similar Products</h2>
								<h3 class="ft-bold pt-3">Matching Producta</h3>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="slide_items">

								<!-- single Item -->
								@foreach ($similer_product as $product)
								<div class="single_itesm">
									<div class="product_grid card b-0 mb-0">
										<div class="badge bg-success text-white position-absolute ft-regular ab-left text-upper">Sale</div>
										<button class="snackbar-wishlist btn btn_love position-absolute ab-right"><i class="far fa-heart"></i></button>
										<div class="card-body p-0">
											<div class="shop_thumb position-relative">
												<a class="card-img-top d-block overflow-hidden" href="{{ route('singel.product', $product->slug) }}"><img class="card-img-top" src="{{ asset('uplode/product') }}/{{ $product->thumbnail }}" alt="..."></a>
												<div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
													<div class="edlio"><a href="{{ route('singel.product', $product->slug) }}" data-toggle="modal" data-target="#quickview" class="text-white fs-sm ft-medium"><i class="fas fa-eye mr-1"></i>Quick View</a></div>
												</div>
											</div>
										</div>
										<div class="card-footer b-0 p-3 pb-0 d-flex align-items-start justify-content-center">
											<div class="text-left">
												<div class="text-center">
													<h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="{{ route('singel.product', $product->slug) }}">{{ $product->title }}</a></h5>
													<div class="elis_rty"><span class="ft-bold fs-md text-dark">{{ $product->total_price }}Tk</span></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endforeach

							</div>
						</div>
					</div>

				</div>
			</section>
			<!-- ======================= Similar Products Start ============================ -->

@endsection

@section('footer_script')
<script>
	$('.color_id').click(function(){
		var color_id = $(this).val();
		var product_id = '{{  $products->first()->id }}';

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type:'POST',
			url:'/getsize',
			data:{'color_id':color_id, 'product_id':product_id},
			success:function(data){
				// alert(data);
				$('#size_id').html(data);
			}
		});
	});
</script>
@endsection
