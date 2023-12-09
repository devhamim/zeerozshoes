@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
        <div class="card mb-4">
            <h6 class="card-header">Permission</h6>
            <div class="card-body">
                {{-- <form method="POST" action="{{route('permission.store')}}">
                    @csrf
                        <div class="form-group">
                            <label class="form-label">Permission name</label>
                            <input type="text" name="permission" class="form-control" placeholder="Enter permission">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form> --}}
                <form action="{{route('permission.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Permission Name</label>
                        <input type="text" name="permission" placeholder="enter permission" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Add permission</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection