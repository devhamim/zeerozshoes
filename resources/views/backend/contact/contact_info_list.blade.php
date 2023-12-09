@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">contacts</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#!">E-Commerce</a></li>
            <li class="breadcrumb-item active"><a href="#!">Contact info</a></li>
        </ol>
    </div>
    <div class="row">
        <!-- customar project  start -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                        <h3>contact info</h3>
                        <a href="{{route('contact.info')}}" class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-plus"></i> Contact info</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="report-table" class="table mb-0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Contact name</th>
                                    <th>Contact email</th>
                                    <th>Contact number</th>
                                    <th>Contact address</th>
                                    <th>Contact information</th>
                                    <th>Status</th>
                                    <th>Create date</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($info as $sl=>$contact)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>{{$contact->contact_name}}</td>
                                        <td>{{$contact->contact_email}}</td>
                                        <td>{{$contact->contact_number}}</td>
                                        <td>{{Str::limit($contact->contact_address, '20', '...')}}</td>
                                        <td>{{Str::limit($contact->contact_info, '20', '...')}}</td>
                                        <td><a href="{{route('contact.info.status', $contact->id)}}" class="badge badge-{{$contact->status == 0 ? 'danger': 'success'}}">{{$contact->status == 0 ? 'Deactive': 'Active'}}</a></td>
                                        <td>{{$contact->created_at->format('j F Y')}}</td>
                                        <td>
                                            <a href="{{route('contact.info.edit', $contact->id)}}" class="btn btn-info btn-sm"><i class="feather icon-edit"></i>&nbsp;Edit </a>
                                            <a href="{{route('contact.info.delete', $contact->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp;Delete </a>
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


@endsection
