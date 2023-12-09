@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Courier</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item active"><a href="#!">Courier</a></li>
        </ol>
    </div>
    <div class="row">
        <!-- customar project  start -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center m-l-0">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6 text-right">
                            <button class="btn btn-success btn-sm mb-3 btn-round" data-toggle="modal" data-target="#user_register"><i class="feather icon-plus"></i>Courier</button>
                        </div>
                    </div>
                    <div class="table table-responsive table-hover">
                        <table id="report-table" class="table table-bordered text-center table-striped">
                            <thead>
                                <tr>
                                    <th>Courier Name</th>
                                    <th>City Available</th>
                                    <th>Zone Available</th>
                                    <th>Courier Charge</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($couriers as $sl=>$courier)
                                    <tr>
                                        <td>{{$courier->name}}</td>
                                        <td>{{$courier->city}}</td>
                                        <td>{{$courier->zone}}</td>
                                        <td>৳{{$courier->charge}}</td>
                                        <td>
                                            @if ($courier->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Deactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" value="{{$courier->id}}" class="btn btn-info btn-sm edit-btn" data-user-id="{{$courier->id}}" data-toggle="modal" data-target="#modals-default">
                                                <i class="feather icon-edit"></i>&nbsp;
                                            </button>
                                            <a href="{{route('courire.delete', $courier->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp; </a>

                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- customar project  end -->
    </div>
</div>

@if ($errors->has('name')||$errors->has('charge'))
    <div class="modal fade show" id="modals-default" aria-modal="true" style="display: block;">
@else
    <div class="modal fade" id="modals-default">
@endif
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="{{ route('courire.update') }}">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Update Courier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Courier Name</label>
                            <input type="hidden" name="courier_id" id="courier_id" value="">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Courier Name" >
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Courier Charge</label>
                            <input type="text" name="charge" id="charge" class="form-control" placeholder="Courier Charge">
                            @error('charge')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <input type="checkbox" name="city" class="form-check-input m-0" id="city" placeholder="city">
                            <label class="floating-label mx-3" for="city">City Available</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <input type="checkbox" name="zone" class="form-check-input m-0" id="zone" placeholder="zone">
                            <label class="floating-label mx-3" for="zone">Zone Available</label>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-5">
                        <div class="form-group fill">
                            <label class="floating-label" for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="2">Deactive</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

@if ($errors->has('name')||$errors->has('charge')||$errors->has('status'))
    <div class="modal show" id="user_register" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" style="display: block;" aria-modal="true">
@else
    <div class="modal" id="user_register" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
@endif
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Courier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('courire.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label" for="name">Courier Name *</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label" for="charge">Courier Charge *</label>
                                    <input type="text" name="charge" class="form-control" id="charge" placeholder="Charge">
                                    @error('charge')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <input type="checkbox" name="city" class="form-check-input m-0" id="city" placeholder="City">
                                    <label class="floating-label mx-3" for="city">City Available</label>
                                   
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <input type="checkbox" name="zone" class="form-check-input m-0" id="zone" placeholder="zone">
                                    <label class="floating-label mx-3" for="zone">Zone Available</label>
                                  
                                </div>
                            </div>
                            <div class="col-sm-12 mb-5">
                                <div class="form-group fill">
                                    <label class="floating-label" for="status">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="2">Deactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
<script>
    $('.edit-btn').click(function() {
        var edit_id = $(this).data('user-id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '/editCourier/' + edit_id,
            data: {'courier_id': edit_id},
            dataType: 'json',
            success: function(data) {
                $('#courier_id').val(data.courier.id);
                $('#name').val(data.courier.name);
                $('#charge').val(data.courier.charge);
                $('#status').val(data.courier.status);
                 // Check or uncheck the checkboxes based on the data values
                $('#city').prop('checked', data.courier.city === 'on');
                $('#zone').prop('checked', data.courier.zone === 'on');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
</script>

@endsection
