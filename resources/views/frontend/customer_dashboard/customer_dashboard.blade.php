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
<div class="mb-4"></div>
@auth('customerauth')
<div class="page-content">
    <div class="dashboard">
        <div class="container">
            <div class="row">
                <aside class="col-md-4 col-lg-3">
                    <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('customer.logout')}}">Sign Out</a>
                        </li>
                    </ul>
                </aside><!-- End .col-lg-3 -->
                
                <div class="col-md-8 col-lg-9">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                            <div class="mb-3">
                                @if (Auth::guard('customerauth')->user()->image == null)
                                    <img src="{{Avatar::create(Auth::guard('customerauth')->user()->name)->toBase64()}}" alt="">
                                @else
                                    <img src="{{asset('uploads/customer')}}/{{Auth::guard('customerauth')->user()->image}}" width="80" alt="profile-dp">
                                @endif
                            </div>
                            <p>Name:  <span class="font-weight-normal text-dark">{{Auth::guard('customerauth')->user()->name}}</span>
                            <p>Email:  <span class="font-weight-normal text-dark">{{Auth::guard('customerauth')->user()->email}}</span>
                            <p>Joined:  <span class="font-weight-normal text-dark">{{Auth::guard('customerauth')->user()->created_at->format('j F Y')}}</span>
                                {{-- <a href="#">Log out</a> --}}
                            <br>
                        </div><!-- .End .tab-pane -->

                        <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                
                                <div class="card">
                                    <div class="">
                                        <table class="table table-striped">
                                            <tr>
                                                <th class="px-3">no.</th>
                                                <th>Order id</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach ($Billingdetails as $sl =>$Billing)
                                                @if ($Billing->first()->id != '')
                                                    @php
                                                        // Fetch order products associated with the current Billing record
                                                        $orderProducts = app\Models\OrderProduct::where('order_id', $Billing->order_id)->get();
                                                    @endphp
                                                    @foreach ($orderProducts as $order)
                                                        <tr>
                                                            <td class="px-3">{{ $sl+1 }}</td>
                                                            <td>{{ $order->order_id }}</td>
                                                            
                                                            @php
                                                                $order_prices = $order->price * $order->quantity;
                                                                $order_coupons = $order_prices - $order->coupon_price;
                                                                $total_prices = $order_coupons + $order->charge;
                                                            @endphp
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
                                                            <td>
                                                                @php
                                                                    $order_ids = str_replace("#","",$order->order_id);
                                                                @endphp
                                                                <a class="badge badge-primary py-2 px-4" href="{{ route('order.view', $order_ids) }}">View</a>
                                                                <a class="badge badge-danger py-2 px-4" href="{{ route('order.cancel', $order->id) }}">Cancel</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="8">
                                                            <p>No orders have been made yet.</p>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            <a href="{{ route('shop') }}" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
                        </div><!-- .End .tab-pane -->

                        <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                            <form action="{{route('customer.profile.update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label>Display Name *</label>
                                <input type="text" name="name" class="form-control" required value="{{Auth::guard('customerauth')->user()->name}}">

                                <label>Email address *</label>
                                <input type="email" name="email" class="form-control" required value="{{Auth::guard('customerauth')->user()->email}}">

                                <label>Address *</label>
                                <input type="text" name="address" class="form-control" value="{{Auth::guard('customerauth')->user()->address == null ? '': Auth::guard('customerauth')->user()->address}}">

                                <label>New password (leave blank to leave unchanged)</label>
                                <input type="password" name="password" class="form-control">

                                <label>Confirm new password</label>
                                <input type="password" name="password_confirmation" class="form-control mb-2">
                                
                                <label>Display Image*</label>
                                <input type="file" name="image" class="form-control mb-2" onchange="document.getElementById('image1').src = window.URL.createObjectURL(this.files[0])">
                                <img width="100" class="mt-3 mb-3" id="image1" height="auto" src="{{asset('uploads/customer')}}/{{(Auth::guard('customerauth')->user()->image == null) ? '': Auth::guard('customerauth')->user()->image}}" alt="">

                                <button type="submit" class="btn btn-outline-primary-2">
                                    <span>SAVE CHANGES</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>
                            </form>
                        </div><!-- .End .tab-pane -->
                    </div>
                </div><!-- End .col-lg-9 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .dashboard -->
</div> 
@else
<h2 class="text-danger text-center mt-5 pt-5">Not found any user</h2>
@endauth
<div class="mb-4"></div>
@endsection

@section('mobile')
<ul class="mobile-cats-menu">
    @foreach ($categories as $category)
    <li><a href="{{route('category.one',$category->id)}}">{{$category->category_name}}</a></li>
    @endforeach
    <li><a href="#">All</a></li>
</ul>
@endsection

@section('footer_script')
    <script>
        $(".col-none").slice(0, 3).show();

        $(".btn-load-more").on("click", function() {
            $(".col-none:hidden").slice(0, 3).show();
            if($(".col-none:hidden").length == 0) {
                // $(".btn-load-more").fadeOut();
                $(".btn-load-more").replaceWith("No more products");
            }
        })
    </script>
@endsection