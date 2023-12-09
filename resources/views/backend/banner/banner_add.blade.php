@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
        <div class="card mb-4">
            <div class="card-header">
                <h6>Sliders</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('banner.store')}}" enctype="multipart/form-data">
                    @csrf
                        {{-- <div class="form-group">
                            <label class="form-label">Sliders Title</label>
                            <input type="text" name="banner_title" class="form-control" placeholder="Sliders Title">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Sliders Link</label>
                            <input type="text" name="banner_link" class="form-control" placeholder="Sliders Title">
                            
                        </div> --}}
                        <div class="form-group upload_file">
                            <label class="form-label w-100">Sliders image</label>
                            <label class="btn btn-outline-primary  mt-2">
                                Sliders image
                                <input type="file" name="banner_image" onchange="document.getElementById('image1').src = window.URL.createObjectURL(this.files[0])" class="image">
                            </label> &nbsp;
                            {{-- <img class="mt-3" id="image" width="100" height="100" alt src /> --}}
                            <img width="100" class="mt-3 mb-3" id="image1" height="auto" src="" alt="">
                            @error('banner_image')
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