@extends('backend.app')

@section('content')
    <!-- main content start -->
    <div class="main-content">
        <div class="dashboard-breadcrumb mb-30">
            <h2>Categories</h2>
        </div>
        <div class="row g-4">
            <div class="col-xxl-4 col-md-5">
                <div class="panel">
                    <div class="panel-header">
                        <h5>Add New Category</h5>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" name="name" class="form-control form-control-sm" id="categoryTitle">
                                    @error('name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>


                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea rows="5" name="description" class="form-control form-control-sm"></textarea>
                                    @error('description')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="upload-category-thumbnail">
                                        <label class="form-label" id="addCatThumb">Add Category Thumbnail</label>
                                        <input type="file" name="category_img" class="form-control" id="thumbUpload">
                                        @error('category_img')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
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
            <div class="col-xxl-8 col-md-7">
                <div class="panel">
                    <div class="panel-header">
                        <h5>All Categories</h5>
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

                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorys as $category)
                                <tr>

                                    <td>
                                        <div class="table-category-card">
                                            <div class="part-icon">
                                                <span><img src="{{ asset('uplode/category') }}/{{ $category->category_img }}" alt=""></span>
                                            </div>
                                            <div class="part-txt">
                                                <span class="category-name">{{ $category->name }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="table-dscr">{{ $category->description }}</span></td>

                                    <td>
                                        <div class="btn-box">
                                            <a href="{{ route('category.edit', $category->id) }}"><i class="fa-light fa-pen-to-square"></i></a>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
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
