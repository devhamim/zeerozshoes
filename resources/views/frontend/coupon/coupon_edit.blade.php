@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
        <div class="card mb-4">
            <div class="card-header">
                <h6>Coupon</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('coupon.update')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label class="form-label">coupon name</label>
                            <input type="text" name="coupon_name" class="form-control" placeholder="name" value="{{$coupon->coupon_name}}">
                            <input type="hidden" name="coupon_id" class="form-control" placeholder="name" value="{{$coupon->id}}">
                            @error('coupon_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">coupon ammount</label>
                            <input type="number" name="coupon_amount" class="form-control" placeholder="amount" value="{{$coupon->coupon_amount}}">
                            @error('coupon_amount')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Coupon validity</label>
                            <input type="date" id="b-m-dtp-date" name="coupon_validity" class="form-control" placeholder="Date" data-dtp="dtp_S2pSu" value="{{$coupon->validity}}">
                            {{-- <input type="datetime-local" name="" id="b-m-dtp-datetime" class="form-control" placeholder="DateTime" data-dtp="dtp_jIQzS"> --}}
                            @error('coupon_validity')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection