@extends('layouts.dashboard')
@section('content')
@foreach ($order_ids as $order_id)
    @php
        $orders = App\Models\Order::where('id', $order_id)->get();
    @endphp
        <div class="container printInvoice" @click="print">
            <div class="row" style="border-bottom: 1px dotted red">
                @foreach ($orders as $order)
                <div class="col-lg-12">
                    @php
                        $billingdetails = App\Models\Billingdetails::where('order_id', $order->order_id)->get();
                    @endphp
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <td>
                                    <img src="{{ asset('uploads/setting') }}/{{ $setting->first()->logo }}" alt="">
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
                                    <p>Invoice #{{ $order->order_id }}</p>
                                    <p>Order Date : {{ $order->created_at->format('d,M,Y') }}</p>
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
                                @php
                                    $orderproduct = App\Models\OrderProduct::where('order_id', $order->order_id)->get();
                                @endphp
                                @foreach ($orderproduct as $sl=>$orderpro)
                                <tr>
                                    <td>{{ $sl+1 }}</td>
                                    <td>{{ $orderpro->rel_to_product->product_name }}</td>
                                    <td>{{ $orderpro->quantity }}</td>
                                    <td>{{ $orderpro->rel_to_product->product_discount*$orderpro->quantity }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">Sub Total</td>
                                    <td>{{ $order->sub_total }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">Shipping Cost (+)</td>
                                    <td>{{ $order->shipping_cost }}</td>
                                </tr> 
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">Delivery Cost (+)</td>
                                    <td>{{ $order->discount }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">Total</td>
                                    <td>{{ $order->total }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
@endforeach



    <script>
        function printInvoice() {
            window.print();
        }
    
        // Automatically trigger print when the page loads (optional)
        window.onload = printInvoice;
    </script>
@endsection