@extends('backend.layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">All Users</a></li>
        </ol>
    </div>
    <div class="main-container">
        <div class="row  gutters">
            @include('backend.pages.extra.message')
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="table-container">
                    <div class="active-user-chatting">
                        <div class="active-user-info">
                            <div class="avatar-info">
                                <h5>All Users</h5>
                            </div>
                        </div>
                        <div class="chat-actions">
                            <a href="{{ route('admin.create') }}" class="btn btn-info btn-md">Add New</a>
                            <a href="{{ route('admin.user') }}" class="btn btn-success btn-md">All Users</a>
                            <a href="{{ route('admin.trash_list') }}" class="btn btn-danger btn-md">Trash list</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="print-table100" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>SL:</th>
                                    <th>Image</th>
                                    <th>Name/UserName</th>
                                    <th>Email/Mobile</th>
                                    <th>Role/Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allAdmin as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @if ($value->image == '')
                                            <td><img src="{{ asset('assets/backend/images/pro.png') }}" alt="No Image"
                                                    id="imgload" width="50" /></td>
                                        @else
                                            <td><img src="{{ asset("assets/backend/images/users/{$value->id}.{$value->image}") }}"
                                                    alt="No Image" id="imgload" width="50" /></td>
                                        @endif
                                        <td>
                                            {{ $value->name }}<br>
                                            {{ $value->username }}
                                        </td>
                                        <td>{{ $value->email }}<br>{{ $value->mobile }}</td>
                                        <td>
                                            <span class="badge badge-success">{{$value->userrole()}}</span>
                                            <br>
                                            @if ($value->status == 1)
                                                <span class="badge badge-info">Active</span>
                                            @else
                                                <span class="badge badge-danger">InActive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.change_password', $value->id) }}"
                                                title="Change Password"><span class="btn btn-primary btn-md"><i
                                                        class="icon-edit-3"></i></span></a>
                                            <a href="{{ route('admin.edit', $value->id) }}" title="Edit Row"><span
                                                    class="btn btn-info btn-md"><i class="icon-edit1"></i></span></a>

                                            <button type="button" class="btn btn-danger btn-md delete-id"
                                                id="{{ $value->id }}" data-toggle="modal"
                                                data-target=".bd-example-modal-sm" onclick="modalview(this.id)"
                                                title="Trash Row"><i class="icon-x"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <!-- ################# Small modal ####################-->
                        @include('backend.pages.admin.trash-modal')
                        <!-- ################# Small modal ####################-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
