@extends('backend.app')

@section('content')
    <!-- main content start -->
    <div class="main-content">
        <div class="dashboard-breadcrumb mb-30">
            <h2>Ad Banner</h2>
        </div>
        <div class="row g-4">
            <div class="col-xxl-6 col-md-4 m-auto">
                <div class="panel">
                    <div class="panel-header">
                        <h5>Edit Ad Banner</h5>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('adbanner.update', $adbanners->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $adbanners->id }}">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Link</label>
                                    <input type="text" name="link" class="form-control form-control-sm" value="{{ $adbanners->link }}">
                                </div>
                                <div class="col-12">
                                    <label for="" class="form-label">Status</label>
                                        <select name="status" class="form-control" id="">
                                            <option value="">-- Select Option --</option>
                                            <option value="1"{{ $adbanners->status == 1?'selected':'' }}>Active</option>
                                            <option value="0"{{ $adbanners->status == 0?'selected':'' }}>Deactive</option>
                                        </select>
                                </div>
                                <div class="col-12">
                                    <div class="upload-category-thumbnail">
                                        <label class="form-label" id="addCatThumb">Add Image</label>
                                        <input type="file" name="image" class="form-control" id="thumbUpload" value="{{ $adbanners->image }}">
                                    </div>
                                    <div class="my-3">
                                        <img width="100" id="blah" src="{{ asset('uplode/adbanner') }}/{{ $adbanners->image }}" alt="">
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <div class="btn-box">
                                        <button type="submit" class="btn btn-sm btn-primary">Save Ad Banner</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
