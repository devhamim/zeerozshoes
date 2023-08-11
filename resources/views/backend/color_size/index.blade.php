@extends('backend.app')

@section('content')
    <!-- main content start -->
    <div class="main-content">
        <div class="dashboard-breadcrumb mb-30">
            <h2>Colors & Size</h2>
        </div>
        <div class="row g-4">
            <div class="col-xxl-6 col-md-5">
                <div class="panel">
                    <div class="panel-header">
                        <h5>Add New Color</h5>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('color_size.store') }}" method="POST">
                        @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Color Name</label>
                                    <input type="text" name="name" class="form-control form-control-sm">
                                    @error('name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Color Name</label>
                                    <input type="text" name="color_code" class="form-control form-control-sm" >
                                    @error('color_code')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                
                                <div class="col-12 d-flex justify-content-end">
                                    <div class="btn-box"> 
                                        <button type="submit" name="btn" value="1" class="btn btn-sm btn-primary">Save Colors</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-md-5">
                <div class="panel">
                    <div class="panel-header">
                        <h5>Add New Size</h5>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('color_size.store') }}" method="POST">
                        @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Size Name</label>
                                    <input type="text" name="name" class="form-control form-control-sm" id="categoryTitle">
                                    @error('name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <div class="btn-box">
                                        <button type="submit" name="btn" value="2" class="btn btn-sm btn-primary">Save Category</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4 mt-2">
            <div class="col-xxl-6 col-md-6">
                <div class="panel">
                    <div class="panel-header">
                        <h5>All Colors</h5>
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
                                    
                                    <th>no.</th>
                                    <th>Name</th>
                                    <th>Color</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colors as $sl=>$color)
                                <tr>
                                    <td><span class="table-dscr">{{ $sl+1 }}</span></td>
                                    <td><span class="table-dscr">{{ $color->name }}</span></td>
                                    <td><span class="table-dscr p-1" style="background: {{ $color->color_code }}">{{ $color->color_code }}</span></td>
                                    
                                    <td>
                                        <div class="btn-box">
                                            <form action="{{ route('color_size.destroy', $color->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" name="btn" value="1" class="border-0 mr-2">
                                                    <i class="fa-light fa-trash"></i>
                                                </button>
                                            </form>
                                            
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
            <div class="col-xxl-6 col-md-6">
                <div class="panel">
                    <div class="panel-header">
                        <h5>All Sizes</h5>
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
                                    
                                    <th>no.</th>
                                    <th>Size</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sizes as $sl=> $size)
                                <tr>
                                    <td><span class="table-dscr">{{ $sl+1 }}</span></td>
                                    <td><span class="table-dscr">{{ $size->name }}</span></td>
                                    
                                    <td>
                                        <div class="btn-box">
                                            <form action="{{ route('color_size.destroy', $size->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" name="btn" value="2" class="border-0 mr-2">
                                                    <i class="fa-light fa-trash"></i>
                                                </button>
                                            </form>
                                            
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

