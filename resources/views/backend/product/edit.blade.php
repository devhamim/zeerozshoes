@extends('backend.app')

@section('content')
<div class="main-content">
    <div class="dashboard-breadcrumb mb-30">
        <h2>Add New Product</h2>
        
    </div>
    <div class="row g-4">
        <form action="{{ route('product.update', $products->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $products->id }}">
            <div class="col-xxl-12 col-lg-12">
                <div class="panel mb-30">
                    <div class="panel-body product-title-input">
                        <label class="form-label">Write Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title for product" value="{{ $products->title }}">
                    </div>
                </div>
                <div class="panel mb-30">
                    <div class="panel-body product-title-input">
                        <label class="form-label">Sort Description</label>
                        <textarea name="sort_desp" class="form-control" placeholder="Sort Description">{{ $products->sort_desp }}</textarea>
                    </div>
                </div>
                <div class="panel mb-30">
                    <div class="form-group my-3">
                        <textarea name="long_desp" id="summernote" class="form-control" placeholder="Long Description">{{ $products->long_desp }}</textarea>
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
                                    
                                    <div class="col-xxl-6 col-md-6 col-6 col-xs-12">
                                        <div class="add-thumbnail product-image-upload">
                                            <label for="" class="form-label">Status</label>
                                            <select name="status" class="form-control" id="">
                                                <option value="">-- Select Option --</option>
                                                <option value="1"{{ $products->status == 1?'selected':'' }}>Active</option>
                                                <option value="0"{{ $products->status == 0?'selected':'' }}>Deactive</option>
                                            </select>
                                        </div>
                                    </div><div class="col-xxl-6 col-md-6 col-6 col-xs-12">
                                        <div class="add-thumbnail product-image-upload">
                                            <label for="" class="form-label">Brand</label>
                                            <select name="brand_id" class="form-control" id="">
                                                <option value="">-- Select Option --</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}" {{ $brand->id == $products->brand_id?'selected':'' }}>{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6 col-6 col-xs-12">
                                        <div class="add-thumbnail product-image-upload">
                                            <label for="" class="form-label">Category</label>
                                            <select name="category_id" class="form-control" id="category_id">
                                                <option value="">-- Select Option --</option>
                                                @foreach ($categorys as $category)
                                                    <option value="{{ $category->id }}"{{ $category->id == $products->category_id?'selected':'' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6 col-6 col-xs-12">
                                        <div class="add-thumbnail product-image-upload">
                                            <label for="" class="form-label">SubCategory</label>
                                            <select name="subcategory_id" class="form-control" id="subcategory_id">
                                                <option value="{{ $products->subcategory_id }}">{{ $products->rel_to_subcat->name }}</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6 col-6 col-xs-12">
                                        <div class="add-thumbnail product-image-upload">
                                            <label for="" class="form-label">Price</label>
                                            <input type="number" name="price" class="form-control" value="{{ $products->price }}">
                                        </div>
                                    </div><div class="col-xxl-6 col-md-6 col-6 col-xs-12">
                                        <div class="add-thumbnail product-image-upload">
                                            <label for="" class="form-label">Discount</label>
                                            <input type="number" name="discount" class="form-control" value="{{ $products->discount }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-6 col-md-6 col-6 col-xs-12">
                                        <div class="add-thumbnail product-image-upload">
                                            <div class="part-txt">
                                                <h5>Add thumbnail <span></span></h5>
                                            </div>
                                            <input type="file" name="thumbnail" class="form-control" value="{{ $products->thumbnail }}">
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6 col-6 col-xs-12">
                                        <div class="add-gallery-img product-image-upload">
                                            <div class="part-txt">
                                                <h5>Add gallery <span></span></h5>
                                            </div>
                                            <input type="file" name="gallery[]" multiple class="form-control" >
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
                        
                    </div>
                    <div class="panel-body">
                           

                            <div class="row g-3 mb-3">
                                <label for="metaTitle" class="col-xxl-2 col-md-3 col-form-label col-form-label-sm">Meta Title</label>
                                <div class="col-xxl-10 col-md-9">
                                    <input type="text" name="meta_title" class="form-control form-control-sm" value="{{ $products->meta_title }}">
                                </div>
                            </div>
                            <div class="row g-3">
                                <label for="metaDscr" class="col-xxl-2 col-md-3 col-form-label col-form-label-sm">Meta Description</label>
                                <div class="col-xxl-10 col-md-9">
                                    <textarea class="form-control" name="meta_desp" rows="5" id="metaDscr">{{ $products->meta_desp }}</textarea>
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