@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
        <div class="card mb-4">
            <h6 class="card-header">Contact Info</h6>
            <div class="card-body">
                <form method="POST" action="{{route('contact.info.update')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label class="form-label">Website name</label>
                            <input type="text" name="contact_name" class="form-control" placeholder="Name" value="{{$contact->contact_name}}">
                            <input type="hidden" name="contact_id" class="form-control" placeholder="Name" value="{{$contact->id}}">
                            @error('contact_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Contact email</label>
                            <input type="text" name="contact_email" class="form-control" placeholder="Email" value="{{$contact->contact_name}}">
                            @error('contact_email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Contact number</label>
                            <input type="text" name="contact_number" class="form-control" placeholder="Number" value="{{$contact->contact_number}}">
                            @error('contact_number')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Contact address</label>
                            <input type="text" name="contact_address" class="form-control" placeholder="Address" value="{{$contact->contact_address}}">
                            @error('contact_address')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Contact information</label>
                            <textarea name="contact_info" class="form-control" placeholder="Info">{{$contact->contact_info}}"</textarea>
                            @error('contact_info')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="clearfix"></div>
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