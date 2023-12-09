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
                    <li><a href="{{route('category.one', $category->id)}}">{{$category->category_name}}</a></li>
                @endforeach
                <li><a href="{{route('category')}}">All</a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="table table-striped" >
                
        <div class="card">
            <div class="">
                <table class="table table-striped">
                    <tr>
                        <th class="px-3">no.</th>
                        <th>Order id</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    @php
                        $total_order_price=0;
                        $sum_quantity=0;
                        $sum_total=0;
                        $sum_price=0;
                    @endphp
                        @foreach ($orders_details as $sl => $order)
                            <tr>
                                <td class="px-3">{{ $sl+1 }}</td>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->rel_to_product->product_name }}</td>
                                @php

                                    $order_prices = $order->price * $order->quantity;
                                    $total_order_price += $order_prices;
                                    $sum_quantity += $order->quantity;
                                    // $order_coupons = $order_prices - $order->coupon_price;
                                @endphp
                                <td>{{ $order->quantity }}x</td>
                                <td>{{ $order->price }}Tk</td>
                                <td>{{ $total_order_price }}x</td>
                                <td>{{ $order->created_at->format('d-M-Y') }}</td>
                                <td>
                                    @if ($order->status == 0)
                                        Pending
                                    @elseif ($order->status == 1)
                                        Confirm
                                    @elseif ($order->status == 2)
                                        Packaging
                                    @elseif ($order->status == 3)
                                        Shipping
                                    @else
                                        Delivered
                                    @endif
                                </td>
                            </tr>
                            
                        @endforeach
                        
                        
                </table>
                <style>
                    .order_cost{
                        text-align: end;
                        margin: 0 20px 20px 0;
                    }
                    .order_cost p{
                        font-weight: 700;
                        padding: 5px 0
                    }
                </style>
                <div class="order_cost">
                    <p>Sub Total : <span> {{ number_format($total_order_price) }}</span> Tk</p>
                    <p>Delevary Charge : <span>  + {{ number_format($orderproducts->first()->charge) }}</span> Tk</p>
                    <p>Discount : <span>  - {{ number_format($orderproducts->first()->coupon_price) }}</span> Tk</p>
                    <hr>
                    @php
                        $coupons = $total_order_price-$orderproducts->first()->coupon_price;
                        $total = $coupons+$orderproducts->first()->charge;
                    @endphp
                    <p>Total :  <span>  {{ number_format($total) }}</span> Tk</p>
                </div>
            </div>
        </div>
    <a href="{{ route('shop') }}" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
    </div>
</div>
@endsection
