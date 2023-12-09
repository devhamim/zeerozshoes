@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Contact</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#!">E-Commerce</a></li>
            <li class="breadcrumb-item active"><a href="#!">Contact</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center m-l-0">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="{{route('contact.delete.all')}}" class="btn btn-warning btn-sm mb-3 btn-round"><i class="feather icon-plus">Delete all</i></a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="report-table" class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Created</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contact as $sl=>$contact)
                                    <tr style="{{$contact->status == 0 ? 'background: rgba(24, 28, 33, 0.025)': ''}}">
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->phone == null ? 'null': $contact->phone}}</td>
                                        <td>{{$contact->message == null ? 'null': Str::limit($contact->message, '40', '...')}}</td>
                                        <td>{{$contact->created_at->diffForHumans()}}</td>
                                        <td>
                                            <button type="button" value="{{$contact->id}}" class="btn btn-primary btn-sm contactt-btn" data-toggle="modal" data-target="#modals-default"><i class="feather icon-eye"></i>&nbsp;Show </button>
                                            <a href="{{route('contact.message.delete', $contact->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp;Delete </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modals-default">
    <div class="modal-dialog">
        <form class="modal-content" action="">
            <div class="modal-header">
                <h5 class="modal-title">Update contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col">
                        <img src="" id="contact_image" alt="">
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Name</label>
                        <input type="text" name="contact_name" id="name" class="form-control" placeholder="Enter your name">
                        <input type="hidden" name="contact_id" id="contact_id" class="form-control" placeholder="Enter your name">
                        @error('contact_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group col">
                        <label class="form-label">Email</label>
                        <input type="email" name="contact_email" id="email" class="form-control" placeholder="Enter your email">
                        @error('contact_email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col mb-0">
                        <label class="form-label">Message</label>
                        <input type="text" name="contact_message" id="message" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>

 @endsection
@section('footer_script')
<script>
    $('.contactt-btn').click(function() {
        var edit_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/contactMessage',
            data: {'message_id': edit_id},
            success: function(data) {
                $('#name').val(data.contact.name);
                $('#email').val(data.contact.email);
                $('#message').val(data.contact.message);
            }
        })
    })
</script>
@endsection
