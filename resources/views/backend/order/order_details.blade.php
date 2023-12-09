@extends('layouts.dashboard')
@section('content')
 <!-- [ Layout content ] Start -->
 <div class="layout-content">

    <!-- [ content ] Start -->
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between">
            <h4 class="font-weight-bold py-3 mb-0">Orders details</h4>
            <div class="invoice">
                <a href="{{ route('invoice.download', $orders_details->first()->id) }}" class="btn btn-success p-2 py-3 mb-0 mr-5">invoice Download</a>
            </div>
        </div>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">E-commerce</li>
                <li class="breadcrumb-item active">Orders details</li>
            </ol>
        </div>
        
        <div class="card">
            <!-- Status -->
            <div class="card-body d-flex">
                <strong class="mr-2">Status:</strong>
                <span class="text-big">
                    @if ($orders_details->first()->status==0)
                        <div class="badge badge-secondary">Pending</div>
                    @elseif ($orders_details->first()->status==1)
                        <div class="badge badge-info">Confirm</div>
                    @elseif ($orders_details->first()->status==2)
                        <div class="badge badge-primary">Packaging</div>
                    @elseif ($orders_details->first()->status==3)
                        <div class="badge badge-primary">Shipping</div>
                    @else
                        <div class="badge badge-success">Delivered</div>
                    @endif

                </span>
                <div class="dropdown mx-1">
                    <button type="button" class="border-0 light sharp" data-toggle="dropdown">
                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                    </button>
                    <div class="dropdown-menu">
                    <form action="{{ route('order.update') }}" method="POST">
                    @csrf
                        <button name="status" value="{{ $orders_details->first()->order_id .','. '0' }}" class="dropdown-item status">Pending</button>
                        <button name="status" value="{{ $orders_details->first()->order_id .','. '1' }}" class="dropdown-item status">Confirm</button>
                        <button name="status" value="{{ $orders_details->first()->order_id .','. '2' }}" class="dropdown-item status">Packaging</button>
                        <button name="status" value="{{ $orders_details->first()->order_id .','. '3' }}" class="dropdown-item status">Shipping</button>
                        <button name="status" value="{{ $orders_details->first()->order_id .','. '4' }}" class="dropdown-item status">Delivered</button>
                    </div>
                </div>
            </div>
            <hr class="m-0">
            <!-- / Status -->

            <!-- Info -->
            <div class="card-body pb-1">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="text-muted small">Date</div>
                        {{ $orders_details->first()->created_at }}
                    </div>
                    @php
                    $items= 0;
                        $items += $orders_details->first()->quantity;
                    @endphp
                    <div class="col-md-4 mb-3">
                        <div class="text-muted small">Order Id</div>
                        {{ $orders_details->first()->order_id }}
                    </div>
                    
                    <div class="col-md-2 mb-3">
                        <div class="text-muted small">Charge</div>
                        @if ($orderproducts->first()->charge == Null)
                            N/A
                        @else
                        {{ $orderproducts->first()->charge }}
                        @endif
                    </div>
                </div>
            </div>
            <hr class="m-0">
            <!-- / Info -->

            <!-- Shipping -->
            <div class="card-body">
                <h6 class="small font-weight-semibold">Shipping Info</h6>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="text-muted small">Name</div>
                        {{ $billingdetails->first()->name }}
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="text-muted small">Phone</div>
                        {{ $billingdetails->first()->mobile }}
                    </div>

                    <div class="col-12">
                        <div class="text-muted small">Address</div>
                        {{ $billingdetails->first()->address }}
                    </div>
                </div>
            </div>
            <hr class="m-0">
            <!-- / Shipping -->

            <!-- Items -->
            <div class="card-body">
                <h6 class="small font-weight-semibold">Items</h6>

                <div class="table-responsive">
                    <table class="table table-bordered m-0" style="min-width:550px;">
                        <tbody>
                            @php
                                $items = 0;
                                $prices = 0;
                            @endphp
                            @foreach ($orders_details as $products)
                            @if ($products->rel_to_product != null)
                            <tr>
                                <td class="p-4">
                                    <div class="media align-items-center">
                                        <img src="{{ asset('uploads/products/preview') }}/{{ $products->rel_to_product->preview_image }}" class="d-block ui-w-40 ui-bordered mr-4" alt>
                                        <div class="media-body">
                                            <a href="javascript:void(0)" class="d-block text-dark">{{ $products->rel_to_product->product_name }}<span class="text-muted"></span></a>
                                            <small>
                                                <span class="text-muted">Color:</span>
                                                @if($products->color_id != null)
                                                <span class="ui-product-color ui-product-color-sm align-text-bottom " style="background: {{ $products->rel_to_color->color_name }}"></span>
                                                @endif &nbsp;
                                                <span class="text-muted">Size: </span>
                                                @if ($products->size_id != null)
                                                    {{ $products->rel_to_size->size_name }}
                                                @endif &nbsp;
                                                {{-- <span class="text-muted">Ships from: </span> China --}}
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <!-- Set column width -->
                                <td class="align-middle p-4" style="width: 66px;">
                                    x{{ $products->quantity }}
                                </td>
                                <!-- Set column width -->
                                <td class="text-right font-weight-semibold align-middle p-4" style="width: 100px;">
                                    @php
                                        $product_price = $products->quantity*$products->price;
                                        $order_coupons = $product_price-$products->coupon_price;
                                        $total_prices = $order_coupons+$products->charge;
                                    @endphp
                                    ৳{{ $total_prices }}
                                </td>
                            </tr>
                                @php
                                    $items += $products->quantity;
                                    $prices += $total_prices;
                                @endphp
                            @endif
                            @endforeach
                            <tr>
                                <td class="p-4" style="text-align: end">Sub Total: </td>
                                <td class="align-middle p-4" style="width: 66px;">x{{ $items }}</td>
                                <td class="text-right font-weight-semibold align-middle p-4" style="width: 100px;">৳{{ $prices }}</td>
                            </tr>
                            {{-- <tr>
                                <td class="p-4" style="text-align: end">Coupon: </td>
                                <td class="align-middle p-4" style="width: 66px;">-</td>
                                <td class="text-right font-weight-semibold align-middle p-4" style="width: 100px;">৳{{ $orderproducts->first()->coupon_price }}</td>
                            </tr> --}}
                            <tr>
                                <td class="p-4" style="text-align: end">Charge: </td>
                                <td class="align-middle p-4" style="width: 66px;">+</td>
                                <td class="text-right font-weight-semibold align-middle p-4" style="width: 100px;">৳{{ $orderproducts->first()->charge }}</td>
                            </tr>
                            <tr>
                                @php
                                    $coupons = $prices-$orderproducts->first()->coupon_price;
                                    $charges = $coupons+$orderproducts->first()->charge;
                                @endphp
                                <td class="p-4" style="text-align: end">Total: </td>
                                <td class="align-middle p-4" style="width: 66px;">=</td>
                                <td class="text-right font-weight-semibold align-middle p-4" style="width: 100px;">৳{{ $charges }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- / Items -->
        </div>
    </div>
    <!-- [ content ] End -->
@endsection
