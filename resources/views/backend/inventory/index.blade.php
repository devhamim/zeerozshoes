@extends('backend.app')

@section('content')
    <!-- main content start -->
    <div class="main-content">
        <div class="dashboard-breadcrumb mb-30">
            <h2>Inventory</h2>
        </div>
        <div class="row g-4">
            <div class="col-xxl-4 col-md-5">
                <div class="panel">
                    <div class="panel-header">
                        <h5>Add New Inventory</h5>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('inventory.store') }}" method="POST">
                        @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Product Name</label>
                                    <input type="hidden" name="product_id" value="{{ $products->id }}">
                                    <input type="text" class="form-control form-control-sm" value="{{ $products->title }}" readonly>

                                </div>
                                <div class="col-12">
                                    <label class="form-label">Color</label>
                                    <select name="color_id" class="form-control" >
                                        <option value="">-- Select Option --</option>
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}" style="background: {{ $color->color_code }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('color_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Size</label>
                                    <select name="size_id" class="form-control" >
                                        <option value="">-- Select Option --</option>
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('size_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Quantity</label>
                                    <input type="text" name="quantity" class="form-control form-control-sm">
                                    @error('quantity')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror

                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <div class="btn-box">
                                        <button type="submit" class="btn btn-sm btn-primary">Save Category</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xxl-8 col-md-7">
                <div class="panel">
                    <div class="panel-header">
                        <h5>All Inventory</h5>
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

                                    <th>Product</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $quantitys=0;
                                @endphp
                                @foreach ($inventorys as $inventory)
                                    <tr>

                                        <td><span class="">{{ $inventory->rel_to_pro->title }}</span></td>
                                        @if($inventory->color_id != null)
                                            <td><span class=" px-3 py-1" style="background: {{ $inventory->rel_to_color->color_code }}">{{ $inventory->rel_to_color->name }}</span></td>
                                        @else
                                            <td><span class=" text-danger">N/A</span></td>
                                        @endif
                                        @if ($inventory->size_id == null)
                                            <td><span class=" text-danger">N/A</span></td>
                                        @else
                                            <td><span class="">{{ $inventory->rel_to_size->name }}</span></td>
                                        @endif
                                        <td><span class="">{{ $inventory->quantity }} P</span></td>
                                        @php
                                            $quantitys += $inventory->quantity
                                        @endphp
                                        <td>
                                            <div class="btn-box">

                                                <form action="{{ route('inventory.destroy', $inventory->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 mr-2">
                                                        <i class="fa-light fa-trash"></i>
                                                    </button>
                                                </form>
                                                <a href=""></a>
                                                <a href=""></a>
                                                <p></p>
                                                <p></p>
                                                <p></p>
                                                <p></p>
                                                <p></p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Total: </td>
                                <td>{{ $quantitys }} P</td>
                                <td></td>
                            </tr>
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
