@extends('backend.app')

@section('content')
    <!-- main content start -->
    <div class="main-content">
        <div class="dashboard-breadcrumb mb-30">
            <h2>Banner</h2>
        </div>
        <div class="row g-4">
            <div class="col-xxl-4 col-md-5">
                <div class="panel">
                    <div class="panel-header">
                        <h5>Add New Banner</h5>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="upload-category-thumbnail">
                                        <label class="form-label" id="addCatThumb">Link</label>
                                        <input type="text" name="link" class="form-control" id="thumbUpload">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="upload-category-thumbnail">
                                        <label class="form-label" id="addCatThumb">Add Image</label>
                                        <input type="file" name="image" class="form-control" id="thumbUpload">
                                        @error('image')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <div class="btn-box">
                                        <button type="submit" class="btn btn-sm btn-primary">Save Banner</button>
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
                        <h5>All Banner</h5>
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
                                    <th>Banner</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banners as $banner)
                                <tr>
                                    <td>
                                        <div class="table-category-card">
                                            <div class="part-icon">
                                                <span><img src="{{ asset('uplode/banner') }}/{{ $banner->image }}" alt=""></span>
                                            </div>
                                            <div class="part-txt">
                                                <span class="category-name">{{ $banner->link }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($banner->status == 1)
                                            <span class="text-success">Active</span>
                                        @else
                                            <span class="text-danger">Deactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="btn-box">
                                            <a href="{{ route('banner.edit', $banner->id) }}"><i class="fa-light fa-pen-to-square"></i></a>
                                            <form action="{{ route('banner.destroy', $banner->id) }}" method="POST">
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
