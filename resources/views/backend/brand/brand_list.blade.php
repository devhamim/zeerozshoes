@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">brand</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#!">E-Commerce</a></li>
            <li class="breadcrumb-item active"><a href="#!">Brand</a></li>
        </ol>
    </div>
    <div class="row">
        <!-- customar project  start -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="report-table" class="table mb-0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Brand image</th>
                                    <th>Brand name</th>
                                    <th>Create Date</th>
                                    <th>Update Date</th>
                                    {{-- <th>Age</th>
                                    <th>Status</th> --}}
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $sl=>$brand)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>
                                            <img src="{{asset('uploads/brand')}}/{{$brand->brand_image}}" alt class="img-fluid img-radius wid-40">
                                        </td>
                                        <td>{{$brand->brand_name}}</td>
                                        <td>{{$brand->created_at->format('d M Y')}}</td>
                                        <td>{{$brand->updated_at == null ? 'Null' : $brand->updated_at->format('d M Y')}}</td>
                                        <td>
                                            <a href="{{route('brand.edit', $brand->id)}}" class="btn btn-info btn-sm"><i class="feather icon-edit"></i>&nbsp;Edit </a>
                                            <a href="{{route('brand.delete', $brand->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp;Delete </a>
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