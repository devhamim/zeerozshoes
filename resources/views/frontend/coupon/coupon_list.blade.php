@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Coupon</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#!">E-Commerce</a></li>
            <li class="breadcrumb-item active"><a href="#!">Coupon</a></li>
        </ol>
    </div>
    <div class="row">
        <!-- customar project  start -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Coupon</h3>
                    <a href="{{route('coupon.add')}}" class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-plus"></i> coupon</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="report-table" class="table mb-0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Coupon name</th>
                                    <th>Amount</th>
                                    <th>Validity</th>
                                    <th>Created</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $sl=>$coupon)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>{{$coupon->coupon_name}}</td>
                                        <td>{{$coupon->coupon_amount}}</td>
                                        <td>
                                            <div class="badge badge-{{(Carbon\Carbon::now() > ($coupon->validity))?'primary':'success'}}">{{Carbon\Carbon::now()->diffInDays($coupon->validity, false)}} days left </div>
                                        </td>
                                        <td>{{$coupon->created_at->format('d M o')}}</td>
                                        <td>
                                            <a href="{{route('coupon.edit', $coupon->id)}}" class="btn btn-info btn-sm"><i class="feather icon-edit"></i>&nbsp;Edit </a>
                                            <a href="{{route('coupon.delete', $coupon->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp;Delete </a>
                                        </td>
                                        
                                        {{-- <td>
                                            <div class="badge badge-{{(Carbon\Carbon::now() > ($coupon->validity))?'warning':'primary'}}">
                                            {{Carbon\Carbon::now()->diffInDays($coupon->validity, false)}} days left </div>
                                        </td> --}}
                                        {{-- </td>{{$coupon->created_at}}</td> --}}
                                        {{-- <td>{{$coupon->created_at->format('d M Y')}}</td>
                                        <td>{{$coupon->updated_at == null ? 'Null' : $coupon->updated_at->format('d M Y')}}</td>
                                        <td>
                                            <a href="{{route('coupon.edit', $coupon->id)}}" class="btn btn-info btn-sm"><i class="feather icon-edit"></i>&nbsp;Edit </a>
                                            <a href="{{route('coupon.delete', $coupon->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp;Delete </a>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- customar project  end -->
    </div>
</div>
@endsection