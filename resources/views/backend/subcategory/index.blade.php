@extends('backend.app')

@section('content')
    <!-- main content start -->
    <div class="main-content">
        <div class="dashboard-breadcrumb mb-30">
            <h2>SubCategories</h2>
        </div>
        <div class="row g-4">
            <div class="col-xxl-4 col-md-5">
                <div class="panel">
                    <div class="panel-header">
                        <h5>Add New SubCategory</h5>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('subcategory.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Category Name</label>
                                    <select name="category" class="form-control form-control-sm" id="subcategoryTitle">
                                        <option value="">-- Select Category --</option>
                                        @foreach ($categorys as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">SubCategory Name</label>
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
                                        <label class="form-label" id="addCatThumb">Add SubCategory Thumbnail</label>
                                        <input type="file" name="subcategory_img" class="form-control" id="thumbUpload">
                                        @error('subcategory_img')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
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
            <div class="col-xxl-8 col-md-7">
                <div class="panel">
                    <div class="panel-header">
                        <h5>All SubCategories</h5>
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
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategorys as $subcategory)
                                <tr>
                                    
                                    <td>
                                        <div class="table-category-card">
                                            <div class="part-icon">
                                                <span><img src="{{ asset('uplode/subcategory') }}/{{ $subcategory->subcategory_img }}" alt=""></span>
                                            </div>
                                            <div class="part-txt">
                                                <span class="category-name">{{ $subcategory->name }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="table-dscr">
                                        @if(App\Models\category::where('id', $subcategory->category)->exists())
                                            {{ $subcategory->rel_to_cat->name }}
                                        @else
                                            <strong class="text-danger">Unknown</strong>
                                        @endif
                                    </span></td>
                                    {{-- <td><span class="table-dscr"> {{ $subcategory->rel_to_cat->name }}</span></td> --}}
                                    <td><span class="table-dscr">{{ $subcategory->description }}</span></td>
                                    
                                    <td>
                                        <div class="btn-box">
                                            <button><i class="fa-light fa-eye"></i></button>
                                            <a href="{{ route('subcategory.edit', $subcategory->id) }}"><i class="fa-light fa-pen-to-square"></i></a>
                                            <form action="{{ route('subcategory.destroy', $subcategory->id) }}" method="POST">
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