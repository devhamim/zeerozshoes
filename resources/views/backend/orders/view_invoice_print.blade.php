@extends('layouts.dashboard')
@section('content')

    <div class="container">
        <div class="row printInvoice" @click="print">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered">
                            <td>
                                {{-- <p><img src="{{ asset('uploads/setting') }}/{{ $setting->first()->logo }}" alt=""></p> --}}
                                <p>{{ $setting->first()->name }}</p>
                                <p>Mobile: {{ $setting->first()->phone }}</p>
                            </td>
                            <td>
                                <h4>Customer Info</h4>
                                <p>{{ $billingdetails->first()->customer_name }}</p>
                                <p>{{ $billingdetails->first()->customer_phone }}</p>
                                <p>{{ $billingdetails->first()->customer_address }}</p>
                            </td>
                            <td>
                                <p>Invoice #{{ $order->first()->order_id }}</p>
                                <p>Order Date : {{ $order->first()->created_at->format('d,M,Y') }}</p>
                            </td>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL#</th>
                                <th>Product(s)</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>
                            @foreach ($OrderProducts as $sl=>$Order)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $Order->rel_to_product->product_name }}</td>
                                <td>{{ $Order->quantity }}</td>
                                <td>{{ $Order->rel_to_product->product_discount*$Order->quantity }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-right">Sub Total</td>
                                <td>{{ $order->first()->sub_total }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-right">Shipping Cost (+)</td>
                                <td>{{ $order->first()->shipping_cost }}</td>
                            </tr> 
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-right">Delivery Cost (+)</td>
                                <td>{{ $order->first()->discount }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-right">Total</td>
                                <td>{{ $order->first()->total }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function printInvoice() {
            window.print();
        }
    
        // Automatically trigger print when the page loads (optional)
        window.onload = printInvoice;
    </script>
@endsection