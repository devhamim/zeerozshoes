@extends('backend.app')

@section('content')
    <!-- main content start -->
    <div class="main-content">
        <div class="dashboard-breadcrumb mb-30">
            <h2>Categories</h2>
        </div>
        <div class="row g-4">
            <div class="col-xxl-6 col-md-4 m-auto">
                <div class="panel">
                    <div class="panel-header">
                        <h5>Edit Category</h5>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('category.update', $categorys->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $categorys->id }}">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" name="name" class="form-control form-control-sm" id="categoryTitle" value="{{ $categorys->name }}">
                                    
                                </div>
                                
                                
                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea rows="5" name="description" class="form-control form-control-sm">{{ $categorys->description }}</textarea>
                                </div>
                                
                                <div class="col-12">
                                    <div class="upload-category-thumbnail">
                                        <label class="form-label" id="addCatThumb">Add Category Thumbnail</label>
                                        <input type="file" name="category_img" class="form-control" id="thumbUpload" value="{{ $categorys->category_img }}">
                                    </div>
                                    <div class="my-3">
                                        <img width="100" id="blah" src="{{ asset('uplode/category/') }}/{{ $categorys->category_img }}" alt="">
                                    </div>
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
            
        </div>

        <!-- footer start -->
        @include('backend.layouts.footer')
        <!-- footer end -->
    </div>
    <!-- main content end -->
@endsection