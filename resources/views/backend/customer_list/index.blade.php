@extends('backend.app')

@section('content')
    <!-- main content start -->
    <div class="main-content">
        <div class="dashboard-breadcrumb mb-30">
            <h2>Customer List</h2>
        </div>
        <div class="row g-4">
            <div class="col-xxl-12 col-md-9 col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h5>All customer</h5>
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

                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customerlist as $customer)
                                <tr>

                                    <td>
                                        <div class="table-category-card">
                                            <div class="part-icon">

                                                @if($customer->photo == null)
                                                    <span><img src="{{ Avatar::create($customer->name)->toBase64() }}" alt=""></span>
                                                @else
                                                <span><img src="{{ asset('uplode/profile') }}/{{ $customer->photo }}" alt=""></span>
                                                @endif
                                            </div>
                                            <div class="part-txt">
                                                <span class="category-name">{{ $customer->name }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="table-dscr">{{ $customer->email }}</span></td>
                                    <td><span class="table-dscr">{{ $customer->address }}</span></td>
                                    <td><span class="table-dscr">{{ $customer->phone }}</span></td>

                                    <td>
                                        <div class="btn-box">
                                            <form action="{{ route('customerlist.destroy', $customer->id) }}" method="POST">
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
