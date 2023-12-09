@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
        <div class="card mb-4">
            <div class="card-header">
                <h6>Category</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label class="form-label">Category name</label>
                            <input type="text" name="category_name" class="form-control" placeholder="name">
                            @error('category_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group fill">
                            <label class="floating-label" for="role">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="1">Active</option>
                                <option value="2">Deactive</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group upload_file">
                            <label class="form-label w-100">Category image</label>
                            <label class="btn btn-outline-primary  mt-2">
                                category image
                                <input type="file" name="category_image" onchange="document.getElementById('image1').src = window.URL.createObjectURL(this.files[0])" class="image">
                            </label> &nbsp;
                            {{-- <img class="mt-3" id="image" width="100" height="100" alt src /> --}}
                            <img width="100" class="mt-3 mb-3" id="image1" height="auto" src="" alt="">
                            @error('category_image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
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