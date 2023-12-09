@extends('layouts.dashboard')
@section('content')
<!-- [ Layout content ] Start -->
<div class="layout-content">

    <!-- [ content ] Start -->
    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Orders</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">E-commerce</li>
                <li class="breadcrumb-item active">Orders</li>
            </ol>
        </div>

        <div class="card">
            <div class="card-datatable table-responsive">
                <table id="order-list" class="table table-striped table-bordered">
                    <div class="mb-3 mx-3" style="width: 15%">
                    <form action="{{ route('order.delivere') }}" method="POST" >
                        @csrf
                        <div class="d-flex">
                            <select name="order_delivere" id="" class="form-control">
                                <option value="1" class="form-control">Non Delivered</a></option>
                                <option value="2" class="form-control">Delivered</a></option>
                            </select>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                    </div>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($orders as $sl=>$order)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->created_at->format('d-M-Y') }}</td>
                            <td>
                                @if ($order->status==0)
                                    <div class="badge badge-secondary">Pending</div>
                                @elseif ($order->status==1)
                                    <div class="badge badge-info">Confirm</div>
                                @elseif ($order->status==2)
                                    <div class="badge badge-primary">Packaging</div>
                                @elseif ($order->status==3)
                                    <div class="badge badge-primary">Shipping</div>
                                @else
                                    <div class="badge badge-success">Delivered</div>
                                @endif
                            </td>
                            @php
                                $order_ids = str_replace("#","",$order->order_id);
                            @endphp
                           <td><a href="{{ route('order.details', $order_ids) }}">view</a></td>
                           <td><a href="{{ route('order.delete', $order->id) }}">Delete</a></td>
                        </tr>
                        @endforeach
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- [ content ] End -->
@endsection
