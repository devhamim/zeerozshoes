@extends('backend.app')

@section('content')
    <!-- main content start -->
    <div class="main-content">
        <div class="dashboard-breadcrumb mb-30">
            <h2>SubCategories</h2>
        </div>
        <div class="row g-4">
            <div class="col-xxl-6 col-md-4 m-auto">
                <div class="panel">
                    <div class="panel-header">
                        <h5>Edit SubCategory</h5>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('subcategory.update', $subcategorys->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $subcategorys->id }}">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Category Name</label>
                                    <select name="category" class="form-control form-control-sm" id="subcategoryTitle">
                                        <option value="">-- Select Category --</option>
                                        @foreach ($categorys as $category)
                                            <option value="{{ $category->id }}"{{ $category->id == $subcategorys->category?'selected':'' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">SubCategory Name</label>
                                    <input type="text" name="name" class="form-control form-control-sm" id="categoryTitle" value="{{ $subcategorys->name }}">
                                    
                                </div>
                                
                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea rows="5" name="description" class="form-control form-control-sm">{{ $subcategorys->description }}</textarea>
                                </div>
                                
                                <div class="col-12">
                                    <div class="upload-category-thumbnail">
                                        <label class="form-label" id="addCatThumb">Add SubCategory Thumbnail</label>
                                        <input type="file" name="subcategory_img" class="form-control" id="thumbUpload" value="{{ $subcategorys->subcategory_img }}">
                                    </div>
                                    <div class="my-3">
                                        <img width="100" id="blah" src="{{ asset('uplode/subcategory/') }}/{{ $subcategorys->subcategory_img }}" alt="">
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <div class="btn-box">
                                        <button type="submit" class="btn btn-sm btn-primary">Save SubCategory</button>
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