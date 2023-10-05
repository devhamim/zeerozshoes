@extends('backend.app')

@section('content')
<div class="main-content">
    <div class="row g-4">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>All Products</h5>
                    <div class="btn-box d-flex flex-wrap gap-2">
                        <div id="tableSearch"></div>

                        <div class="btn-box">
                            <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary"><i class="fa-light fa-plus"></i> Add New</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">

                    <div class="table-filter-option">
                        <div class="row g-3">
                            <div class="col-xl-10 col-9 col-xs-12">
                                <div class="row g-3">
                                    <div class="col">
                                        <form class="row g-2" action="{{ route('product.status') }}" method="POST">
                                            @csrf
                                            <div class="col">
                                                <select class="form-control" id="status" name="status">
                                                    <option value="">-- Select Status --</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Deactive</option>
                                                    </select>
                                            </div>
                                            <div class="col">
                                                <button type="submit" class="btn btn-sm btn-primary w-100">Apply</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-3 col-xs-12 d-flex justify-content-end">
                                <div id="productTableLength"></div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-dashed table-hover digi-dataTable all-product-table table-striped" id="allProductTable">
                        <thead>
                            <tr>

                                <th>No.</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Published</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $sl=>$product)
                            <tr>
                                <td>
                                    {{ $sl+1 }}
                                </td>
                                <td>
                                    <div class="table-product-card">
                                        <div class="part-img">
                                            <img src="{{ asset('uplode/product') }}/{{ $product->thumbnail }}" alt="Image">
                                        </div>
                                        <div class="part-txt">
                                            <span class="product-name">{{ $product->title }}</span>
                                            <span class="product-category">Category: {{ $product->rel_to_cat->name }}/{{ $product->rel_to_subcat->name }}</span>
                                            <span class="product-category">Brand: {{ $product->rel_to_brand->name }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $product->price }}Tk</td>
                                <td>{{ $product->discount }}Tk</td>
                                <td>{{ $product->total_price }}Tk</td>
                                <td>
                                    @if($product->status == 1)
                                        <span class="text-success">Active</span>
                                    @else
                                        <span class="text-danger">Deactive</span>
                                    @endif
                                </td>

                                <td>{{ $product->created_at }}</td>
                                <td>
                                    <div class="btn-box">
                                        <a href="{{ route('product.inventory', $product->id) }}"><i class="fa-light fa-eye"></i></a>
                                        <a href="{{ route('product.edit', $product->id) }}"><i class="fa-light fa-pen-to-square"></i></a>
                                            <form action="{{ route('product.destroy', $product->id) }}" method="POST">
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
    <div class="footer">
        @include('backend.layouts.footer')
    </div>
    <!-- footer end -->
</div>
<!-- main content end -->
@endsection
