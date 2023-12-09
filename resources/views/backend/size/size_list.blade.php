@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">sizes</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#!">E-Commerce</a></li>
            <li class="breadcrumb-item active"><a href="#!">sizes</a></li>
        </ol>
    </div>
    <div class="row">
        <!-- customar project  start -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                        <h3>sizes</h3>
                        <a href="{{route('size.add')}}" class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-plus"></i> Sizes</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="report-table" class="table mb-0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Size</th>
                                    <th>Create Date</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sizes as $sl=>$size)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>{{$size->size_name == null ? 'null': $size->size_name}}</td>
                                        <td>{{$size->created_at->format('d M Y')}}</td>
                                        <td>
                                            <a href="{{route('size.delete', $size->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp;Delete </a>
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