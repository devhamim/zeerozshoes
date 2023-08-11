@extends('backend.app')

@section('content')
    <!-- main content start -->
    <div class="main-content">
        <div class="dashboard-breadcrumb mb-30">
            <h2>Brands</h2>
        </div>
        <div class="row g-4">
            <div class="col-xxl-6 col-md-4 m-auto">
                <div class="panel">
                    <div class="panel-header">
                        <h5>Edit Brand</h5>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('brand.update', $brands->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $brands->id }}">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Brand Name</label>
                                    <input type="text" name="name" class="form-control form-control-sm" id="categoryTitle" value="{{ $brands->name }}">
                                    
                                </div>
                                
                                
                                <div class="col-12">
                                    <div class="upload-category-thumbnail">
                                        <label class="form-label" id="addCatThumb">Add Brand Thumbnail</label>
                                        <input type="file" name="brand_img" class="form-control" id="thumbUpload" value="{{ $brands->brand_img }}">
                                    </div>
                                    <div class="my-3">
                                        <img width="100" id="blah" src="{{ asset('uplode/brand/') }}/{{ $brands->brand_img }}" alt="">
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <div class="btn-box">
                                        <button type="submit" class="btn btn-sm btn-primary">Save Brand</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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