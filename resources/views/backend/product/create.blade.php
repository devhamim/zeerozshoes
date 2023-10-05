@extends('backend.app')

@section('content')
 <!-- main content start -->
 <div class="main-content">
    <div class="dashboard-breadcrumb mb-30">
        <h2>Add New Product</h2>
        <div class="btn-box">
            <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary">View All</a>
        </div>
    </div>
    <div class="row g-4">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="col-xxl-12 col-lg-12">
                <div class="panel mb-30">
                    <div class="panel-body product-title-input">
                        <label class="form-label">Write Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title for product" value="{{ old('title') }}">
                        @error('title')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="panel mb-30">
                    <div class="panel-body product-title-input">
                        <label class="form-label">Sort Description</label>
                        <textarea name="sort_desp" class="form-control" placeholder="Sort Description">{{ old('sort_desp') }}</textarea>
                        @error('sort_desp')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="panel mb-30">
                    <div class="form-group my-3">
                        <textarea name="long_desp" id="summernote" class="form-control" placeholder="Long Description">{{ old('long_desp') }}</textarea>
                        @error('long_desp')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="panel mb-30">
                    <div class="panel-header">
                        <h5>Product Data</h5>


                    </div>
                    <div class="panel-body">
                        <div class="tab-content product-data-tab" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-media" role="tabpanel" aria-labelledby="nav-media-tab" tabindex="0">
                                <div class="row mb-4">

                                    <div class="col-xxl-4 col-md-4 col-4 col-xs-12">
                                        <div class="add-thumbnail product-image-upload">
                                            <label for="" class="form-label">Brand</label>
                                            <select name="brand_id" class="form-control" value="{{ old('brand_id') }}">
                                                <option value="">-- Select Option --</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('brand_id')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xxl-4 col-md-4 col-4 col-xs-12">
                                        <div class="add-thumbnail product-image-upload">
                                            <label for="" class="form-label">Category</label>
                                            <select name="category_id" value="{{ old('category_id') }}" class="form-control" id="category_id">
                                                <option value="">-- Select Option --</option>
                                                @foreach ($categorys as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xxl-4 col-md-4 col-4 col-xs-12">
                                        <div class="add-thumbnail product-image-upload">
                                            <label for="" class="form-label">SubCategory</label>
                                            <select value="{{ old('subcategory_id') }}" name="subcategory_id" class="form-control" id="subcategory_id">
                                                <option value="">-- Select Option --</option>
                                            </select>
                                            @error('subcategory_id')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6 col-6 col-xs-12">
                                        <div class="add-thumbnail product-image-upload">
                                            <label for="" class="form-label">Price</label>
                                            <input type="number" value="{{ old('price') }}" name="price" class="form-control">
                                            @error('price')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div><div class="col-xxl-6 col-md-6 col-6 col-xs-12">
                                        <div class="add-thumbnail product-image-upload">
                                            <label for="" class="form-label">Discount</label>
                                            <input type="number" value="{{ old('discount') }}" name="discount" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-6 col-md-6 col-6 col-xs-12">
                                        <div class="add-thumbnail product-image-upload">
                                            <div class="part-txt">
                                                <h5>Add thumbnail <span></span></h5>
                                            </div>
                                            <input type="file" value="{{ old('thumbnail') }}" name="thumbnail" class="form-control">
                                            @error('thumbnail')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6 col-6 col-xs-12">
                                        <div class="add-gallery-img product-image-upload">
                                            <div class="part-txt">
                                                <h5>Add gallery <span></span></h5>
                                            </div>
                                            <input type="file" value="{{ old('gallery[]') }}" name="gallery[]" multiple class="form-control">
                                            @error('gallery')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-header">
                        <h5>SEO Data</h5>
                        <div class="btn-box d-flex gap-2">

                        </div>
                    </div>
                    <div class="panel-body">
                            {{-- <!-- Input field for entering tags -->
                            <div class="row g-3 mb-3">
                                <label for="tagsInput" class="col-xxl-2 col-md-3 col-form-label col-form-label-sm">Tags</label>
                                <div class="col-xxl-10 col-md-9">
                                    <input type="text" name="tag[]" class="form-control form-control-sm" id="tagsInput" placeholder="Enter tags...">
                                </div>
                            </div>

                            <!-- Container to display selected tags as badges -->
                            <div name="tag[]" id="tagContainer"></div> --}}

                            <div class="row g-3 mb-3">
                                <label for="metaTitle" class="col-xxl-2 col-md-3 col-form-label col-form-label-sm">Meta Title</label>
                                <div class="col-xxl-10 col-md-9">
                                    <input type="text" value="{{ old('meta_title') }}" name="meta_title" class="form-control form-control-sm" id="metaTitle">
                                    @error('meta_title')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-3">
                                <label for="metaDscr" class="col-xxl-2 col-md-3 col-form-label col-form-label-sm">Meta Description</label>
                                <div class="col-xxl-10 col-md-9">
                                    <textarea class="form-control" name="meta_desp" rows="5" id="metaDscr">{{ old('meta_desp') }}</textarea>
                                    @error('meta_desp')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-body text-center">
                        <button type="submit" class="btn btn-primary px-5 mb-2">Save Product</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- footer start -->
    <div class="footer">
        @include('backend.layouts.footer')
    </div>
    <!-- footer end -->
</div>
<!-- main content end -->
@endsection

@section('footer_script')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
        placeholder: 'Long Description',
        width: 1800,
        height: 150
      });
            });
    </script>

<script>
   $(document).ready(function(){
        $('#category_id').change(function(){
            var category_id = $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'/getsubcategory',
                data:{'category_id':category_id},
                success:function(data){
                    // alert(data);
                    //  console.log(data);
                    $('#subcategory_id').html(data);
                    // console.log(subcate);
                }
            })
        })
    });

</script>

@endsection
