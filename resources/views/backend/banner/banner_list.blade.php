@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Sliders</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#!">E-Commerce</a></li>
            <li class="breadcrumb-item active"><a href="#!">Sliders</a></li>
        </ol>
    </div>
    <div class="row">
        <!-- customar project  start -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Sliders</h3>
                    <a href="{{route('banner.add')}}" class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-plus"></i> Sliders</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="report-table" class="table table-bordered text-center table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Sliders image</th>
                                    {{-- <th>Sliders Title</th>
                                    <th>Sliders Link</th> --}}
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banners as $sl=>$banner)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>
                                            <img src="{{asset('uploads/banner')}}/{{$banner->banner_image}}" alt class="img-fluid wid-100">
                                        </td>
                                        {{-- <td>{{$banner->banner_title}}</td>
                                        <td>{{$banner->banner_link}}</td> --}}
                                        <td>
                                            <a href="{{route('banner.edit', $banner->id)}}" class="btn btn-info btn-sm"><i class="feather icon-edit"></i>&nbsp;Edit </a>
                                            <a href="{{route('banner.delete', $banner->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp;Delete </a>
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
