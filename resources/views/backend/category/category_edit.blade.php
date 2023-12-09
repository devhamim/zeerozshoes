@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
        <div class="card mb-4">
            <h6 class="card-header">Category</h6>
            <div class="card-body">
                <form method="POST" action="{{route('category.update')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label class="form-label">Category name</label>
                            <input type="text" name="category_name" class="form-control" placeholder="name" value="{{$category->category_name}}">
                            <input type="hidden" name="category_id" class="form-control" placeholder="name" value="{{$category->id}}">
                            @error('category_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label mb-2">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{$category->status == 1 ? 'selected' : ''}}>Active</option>
                                <option value="2" {{$category->status == 2 ? 'selected' : ''}}>Deactive</option>
                            </select>
                        </div>
                        <div class="form-group upload_file">
                            <label class="form-label w-100">Category image</label>
                            <label class="btn btn-outline-primary  mt-2">
                                category image
                                <input type="file" name="category_image" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" class="image">
                            </label> &nbsp;
                            <img class="mt-3" id="image" src="{{asset('uploads/category')}}/{{$category->category_image}}" width="100" height="100" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection