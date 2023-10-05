@extends('backend.app')

@section('content')
    <!-- main content start -->
    <div class="main-content">
        <div class="dashboard-breadcrumb mb-30">
            <h2>Customer Message</h2>
        </div>
        <div class="row g-4">
            <div class="col-xxl-12 col-md-12 col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h5>All Message</h5>
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
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $message)
                                <tr>
                                    
                                    <td><span class="table-dscr">{{ $message->name }}</span></td>
                                    <td><span class="table-dscr">{{ $message->email }}</span></td>
                                    <td><span class="table-dscr">{{ $message->subject }}</span></td>
                                    <td><span class="table-dscr">{{ $message->message }}</span></td>
                                    
                                    <td>
                                        <div class="btn-box">
                                            <form action="{{ route('customermessage.destroy', $message->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 mr-2">
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