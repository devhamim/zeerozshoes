@extends('frontend.layouts.app')

@section('content')
<!-- ======================= Top Breadcrubms ======================== -->
<div class="gray py-3">
    <div class="container">
        <div class="row">
            <div class="colxl-12 col-lg-12 col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="text-center d-block mb-5">
                    <h2>Shopping Cart</h2>
                </div>
            </div>
        </div>
        @php
            $subtotal = 0;
            $discount = 0;
            $total = 0;
        @endphp
        <div class="row justify-content-between">
            <div class="col-12 col-lg-7 col-md-12">
                <form action="{{ route('cart.update') }}" method="POST">
                    @csrf
                <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x mb-4">
                    @foreach ($cards as $card)
                    <li class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <!-- Image -->
                                <a href="product.html"><img src="{{ asset('uplode/product') }}/{{ $card->rel_to_pro->thumbnail }}" alt="..." class="img-fluid"></a>
                            </div>
                            <div class="col d-flex align-items-center justify-content-between">
                                <div class="cart_single_caption pl-2">
                                    <h4 class="product_title fs-md ft-medium mb-1 lh-1">{{ $card->rel_to_pro->title  }}</h4>
                                    <p class="mb-1 lh-1"><span class="text-dark">Size: {{ $card->rel_to_size->name }}</span></p>
                                    <p class="mb-3 lh-1"><span class="text-dark">Color: {{ $card->rel_to_color->name }}</span></p>
                                    <h4 class="fs-md ft-medium mb-3 lh-1">{{ number_format($card->rel_to_pro->price) }} Tk X {{ $card->quantity }}</h4>
                                    <select class="mb-2 custom-select w-auto" name="quantity[{{ $card->id }}]">
                                        <option value="1"{{ ($card->quantity == 1)?'selected':'' }}>1</option>
                                        <option value="2"{{ ($card->quantity == 2)?'selected':'' }}>2</option>
                                        <option value="3"{{ ($card->quantity == 3)?'selected':'' }}>3</option>
                                        <option value="4"{{ ($card->quantity == 4)?'selected':'' }}>4</option>
                                        <option value="5"{{ ($card->quantity == 5)?'selected':'' }}>5</option>
                                    </select>
                                </div>
                                <div class="fls_last"><a href="{{ route('card.remove', $card->id) }}" class="close_slide gray"><i class="ti-close"></i></a></div>
                            </div>
                        </div>
                    </li>
                    @php
                        $subtotal += $card->rel_to_pro->price*$card->quantity;
                        $discount += $card->rel_to_pro->discount*$card->quantity;
                        $total += $card->rel_to_pro->total_price*$card->quantity;
                    @endphp
                    @endforeach
                </ul>
                <div class="col-12 col-md-auto mfliud ml-5 pl-5 text-center">
                    <button class="btn stretched-link borders">Update Cart</button>
                </div>
                </form>
            </div>

            <div class="col-12 col-md-12 col-lg-4">
                <div class="card mb-4 gray mfliud">
                  <div class="card-body">
                    <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                      <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                        <span>Subtotal</span> <span class="ml-auto text-dark ft-medium">{{ number_format($subtotal) }} Tk</span>
                      </li>
                      <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                        <span>Discount</span> <span class="ml-auto text-dark ft-medium">{{ number_format($discount) }} Tk</span>
                      </li>
                      <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                        <span>Total</span> <span class="ml-auto text-dark ft-medium">{{ number_format($total) }} Tk</span>
                      </li>

                    </ul>
                  </div>
                </div>
                @php
                    session([
                        'total'=>$total,
                        // 'discount'=>$discount,
                    ])
                @endphp
                <a class="btn btn-block btn-dark mb-3" href="{{ route('checkout') }}">Proceed to Checkout</a>

                <a class="btn-link text-dark ft-medium" href="{{ route('shop') }}">
                  <i class="ti-back-left mr-2"></i> Continue Shopping
                </a>
            </div>

        </div>

    </div>
</section>
<!-- ======================= Product Detail End ======================== -->
@endsection
