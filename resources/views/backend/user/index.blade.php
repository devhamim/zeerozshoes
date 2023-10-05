@extends('backend.app')

@section('content')
    <!-- main content start -->
    <div class="main-content">
        <div class="dashboard-breadcrumb mb-30">
            <h2>User</h2>
        </div>
        <div class="row g-4">
            <div class="col-xxl-4 col-md-5">
                <div class="panel">
                    <div class="panel-header">
                        <h5>Add New User</h5>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('user.register') }}">
                        @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="name" class="form-label">Name</label>
                                    <input id="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="password-confirm" class="form-label">Password Confirm</label>
                                     <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <div class="btn-box">
                                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xxl-8 col-md-7">
                <div class="panel">
                    <div class="panel-header">
                        <h5>All User</h5>
                        <div class="btn-box d-flex gap-2">
                            <div id="tableSearch"></div>

                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-filter-option">
                            <div class="row justify-content-between g-3">
                                <div class="col-xxl-4 col-6 col-xs-12">

                                </div>
                                <div class="col-xl-2 col-3 col-xs-12 d-flex justify-content-end">
                                    <div id="productTableLength"></div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-dashed table-hover digi-dataTable all-product-table table-striped" id="allProductTable">
                            <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>

                                    <td>
                                        <div class="table-category-card">
                                            {{-- <div class="part-icon">
                                                <span><img src="{{ asset('uplode/category') }}/{{ $category->category_img }}" alt=""></span>
                                            </div> --}}
                                            <div class="part-txt">
                                                <span class="category-name">{{ $user->name }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="table-dscr">{{ $user->email }}</span></td>

                                    <td>
                                        <div class="btn-box">
                                            <a href="{{ route('user.delete', $user->id) }}"><i class="fa-light fa-trash"></i></a>
                                            {{-- <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 mr-2">
                                                    <i class="fa-light fa-trash"></i>
                                                </button>
                                            </form> --}}

                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="table-bottom-control"></div>
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
