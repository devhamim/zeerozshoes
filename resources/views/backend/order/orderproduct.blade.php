@extends('backend.app')

@section('content')
    <!-- main content start -->
    <div class="main-content">
        <div class="dashboard-breadcrumb mb-30">
            <h2>Customer Details</h2>
            <a href="{{ route('invoice.download', $order_product->first()->id) }}" class="btn btn-success p-2">invoice Download</a>
            <a href="" @click.prevent="printme" class="btn btn-success p-2">invoice Print</a>
        </div>
        <table class="table table-hover digi-dataTable mb-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Payment Method</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><span class="table-dscr">{{ $billingdetails->first()->name }}</span></td>
                    <td><span class="table-dscr">{{ $billingdetails->first()->mobile }}</span></td>
                    <td><span class="table-dscr">{{ $billingdetails->first()->email }}</span></td>
                    <td><span class="table-dscr">{{ $billingdetails->first()->address }}</span></td>
                    @if ($orders->first()->payment_method == 1)
                        <td><span class="btn-box">cash on delivery</span></td>
                     @else
                        <td><span class="btn-box"></span></td>
                    @endif
                    @if ($billingdetails->first()->notes != null)
                        <td><span class="btn-box">{{ $billingdetails->first()->notes }}</span></td>
                     @else
                        <td><span class="btn-box"></span></td>
                    @endif
                </tr>
            </tbody>
        </table>
        <div class="row g-4">
            <div class="col-xxl-12 col-md-9 col-12">
                <div class="panel">

                    <div class="panel-body">
                        <div class="table-filter-option">
                            <div class="row justify-content-between g-3">

                                <div class="col-xxl-11 col-11 col-xs-11">
                                    <div class="panel-header">
                                        <h5>All Product</h5>
                                        <div class="btn-box d-flex gap-2">
                                            <div id="tableSearch"></div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-1 col-1 col-xs-11 d-flex justify-content-end mt-3">
                                    <div id="productTableLength"></div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-dashed table-hover digi-dataTable all-product-table table-striped" id="allProductTable">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Product</th>
                                    {{-- <th>Customer</th> --}}
                                    <th>Price</th>
                                    <th>color</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order_product as $order)
                                <tr>
                                    <td><span class="table-dscr">#{{ $order->order_id }}</span></td>
                                    <td>
                                        <div class="table-product-card">
                                            <div class="part-img">
                                                <img src="{{ asset('uplode/product') }}/{{ $order->rel_to_pro->thumbnail }}" alt="Image">
                                            </div>
                                            <div class="part-txt">
                                                <span class="product-name">{{ $order->rel_to_pro->title }}</span>
                                                <span class="product-category">Category: {{ $order->rel_to_pro->rel_to_cat->name }}/{{ $order->rel_to_pro->rel_to_subcat->name }}</span>
                                                <span class="product-category">Brand: {{ $order->rel_to_pro->rel_to_brand->name }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- <td><span class="table-dscr">{{ $order->rel_to_customer->name }}</span></td> --}}
                                    <td><span class="table-dscr">{{ $order->price }}</span></td>
                                    <td><span class="table-dscr">{{ $order->rel_to_color->name }}</span></td>
                                    <td><span class="table-dscr">{{ $order->rel_to_size->name }}</span></td>
                                    <td><span class="btn-box">{{ $order->quantity }}</span></td>

                                    {{-- <td>
                                        <div class="btn-box">
                                            <a href="{{ route('orderproduct.destroy', $order->id) }}"> <i class="fa-light fa-trash"></i></a>

                                        </div>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="table-bottom-control"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer start -->
        @include('backend.layouts.footer')
        <!-- footer end -->
    </div>
    <!-- main content end -->
@endsection

@section('footer_script')
<script>
    printme(){
    window.print();
}
</script>
@endsection
