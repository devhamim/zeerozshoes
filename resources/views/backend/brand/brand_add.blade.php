@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
        <div class="card mb-4">
            <div class="card-header">
                <h6>Brand</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('brand.store')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label class="form-label">Brand name</label>
                            <input type="text" name="brand_name" class="form-control" placeholder="name">
                            @error('brand_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group upload_file">
                            <label class="form-label w-100">Brand image</label>
                            <label class="btn btn-outline-primary  mt-2">
                                Brand image
                                <input type="file" name="brand_image" class="image" onchange="document.getElementById('image1').src = window.URL.createObjectURL(this.files[0])" class="image">
                            </label>
                            <img width="100" class="mt-3 mb-3" id="image1" height="auto" src="" alt="">
                            @error('brand_image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="clearfix"></div>
                            {{-- <img class="mt-3" id="image" src="{{asset('uploads/category')}}/{{$bra->bra_image}}" width="100" height="100" /> --}}
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection