@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">products</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#!">E-Commerce</a></li>
            <li class="breadcrumb-item active"><a href="#!">products</a></li>
        </ol>
    </div>
    <div class="row">
        <!-- customar project  start -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                        <h3>products</h3>
                        <a href="{{route('product.add')}}" class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-plus"></i> products</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="report-table" class="table table-bordered text-center table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Sku</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $sl=>$product)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td><img src="{{asset('uploads/products/preview')}}/{{$product->preview_image}}" alt class="img-fluid wid-40"></td>
                                        <td style="width: 50%">{{$product->product_name}}</td>
                                        @php
                                            $after_explode = explode(',', $product->category_id);
                                        @endphp
                                        <td>
                                            @foreach ($after_explode as $category_id)
                                            @php
                                                $categorys = App\Models\Category::where('id', $category_id)->get();
                                            @endphp
                                            @foreach ($categorys as $category)
                                                {{ $category->category_name }},
                                            @endforeach
                                        @endforeach
                                        </td>
                                        {{-- <td>{{$after_explode->rel_to_category->category_name}}</td> --}}
                                        <td>{{$product->sku}}</td>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{$product->product_price}}</td>
                                        <td>{{$product->product_discount}}</td>
                                        <td><span class="badge badge-{{$product->status == 1 ? 'success' : 'danger'}}">{{$product->status == 1 ? 'Active' : 'Deactive'}}</span></td>
                                        <td>
                                            <a href="{{route('product.edit', $product->id)}}" class=""><i class="fa fa-edit"></i> </a>
                                            <a href="{{route('product.delete', $product->id)}}" class=""><i class="fa fa-trash"></i> </a>
                                        </td>
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
