@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y pt-5">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 m-auto">
        <div class="card mb-4">
            <h6 class="card-header">Return Policy</h6>
            <div class="card-body">
                <form method="POST" action="{{route('terms.conditions.update', $terms_conditions->first()->id)}}" >
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $terms_conditions->first()->id }}">
                            <textarea id="summernote" name="terms_conditions" class="form-control" placeholder="terms & Condition">{!! $terms_conditions->first()->terms_conditions !!}</textarea>
                            @error('terms_Condition')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection