@extends('backend.app')

@section('content')
    <!-- main content start -->
    <div class="main-content">
        <div class="dashboard-breadcrumb mb-30">
            <h2>Order List</h2>
        </div>
        <div class="row g-4">
            <div class="col-xxl-12 col-md-9 col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h5>All Order</h5>
                        <div class="btn-box d-flex gap-2">
                            <div id="tableSearch"></div>
                            
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-filter-option">
                            <div class="row justify-content-between g-3">
                                <div class="col-xxl-4 col-6 col-xs-12">
                                    
                                </div>
                                <div class="col-xl-2 col-3 col-xs-12 d-flex justify-content-end">
                                    <div id="productTableLength"></div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-dashed table-hover digi-dataTable all-product-table table-striped" id="allProductTable">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Customer name</th>
                                    <th>Sub total</th>
                                    <th>Total</th>
                                    <th>Charge</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td><span class="table-dscr">#{{ $order->order_id }}</span></td>
                                    <td><span class="table-dscr">{{ $order->rel_to_customer->name }}</span></td>
                                    <td><span class="table-dscr">{{ $order->sub_total }}</span></td>
                                    <td><span class="table-dscr">{{ $order->total }}</span></td>
                                    <td><span class="table-dscr">{{ $order->charge }}</span></td>
                                    <td><span class="table-dscr">{{ $order->created_at->format('d-m-Y') }}</span></td>
                                    <td><span class="table-dscr">
                                        
                                        <div class="col">
                                            <form action="{{ route('order.status', $order->id) }}" method="POST">
                                                @csrf
                                            <div class="dropdown">
                                                <button class="border-0 bg-body" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                                    @php
                                                    if($order->status == 1){
                                                        echo '<span class="btn btn-info">Placed</span>';
                                                    }
                                                    elseif ($order->status == 2) {
                                                        echo '<span class="btn btn-secondary">Processing</span>';
                                                    }
                                                    elseif ($order->status == 3) {
                                                        echo '<span class="btn btn-primary">Packeging</span>';
                                                    }
                                                    elseif ($order->status == 4) {
                                                        echo '<span class="btn btn-warning ">Ready To Deliver</span>';
                                                    }
                                                    elseif ($order->status == 5) {
                                                        echo '<span class="btn btne-dark">Shipping</span>';
                                                    }
                                                    else {
                                                        echo '<span class="btn btn-success">Delivered</span>';
                                                    }
                                                @endphp
                                                </button>
                                                
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                  <li>
                                                    <button name="status" value="{{ $order->order_id .','. '1' }}" class="dropdown-item status">Placed</button>
                                                </li>
                                                <li>
                                                    <button name="status" value="{{ $order->order_id .','. '2' }}" class="dropdown-item status">Processing</button>
                                                </li>
                                                  <li>
                                                    <button name="status" value="{{ $order->order_id .','. '3' }}" class="dropdown-item status">Packeging</button>
                                                </li>
                                                  <li>
                                                    <button name="status" value="{{ $order->order_id .','. '4' }}" class="dropdown-item status">Ready To Deliver</button>
                                                </li>
                                                  <li>
                                                    <button name="status" value="{{ $order->order_id .','. '5' }}" class="dropdown-item status">Shipping</button>
                                                </li>
                                                  <li>
                                                    <button name="status" value="{{ $order->order_id .','. '6' }}" class="dropdown-item status">Delivered</button>
                                                </li>
                                                </ul>
                                            </div>
                                        </form>
                                        </div>    
                                    </span></td>
                                    
                                    <td>
                                        <div class="btn-box">
                                            <a href="{{ route('orderproduct', $order->order_id) }}"><i class="fa-light fa-eye"></i></a>
                                            <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 pr-5">
                                                    <i class="fa-light fa-trash"></i>
                                                </button>
                                            </form>
                                            
                                        </div>
                                    </td>
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
{{-- <script>
    $('.status').change(function(){
     var status = $('.status').val();

     var link = "{{ route('order.status') }}"+"?q="+status+"&status="+status;
     window.location.href = link;
 });
 </script> --}}
 {{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const statusSelect = document.getElementById("status");
        
        statusSelect.addEventListener("change", function() {
            const selectedValue = statusSelect.value;
            const statusField = document.getElementById("status");
            
            // Update the hidden input field with the selected value
            statusField.value = selectedValue;
        });
    });
</script> --}}
@endsection