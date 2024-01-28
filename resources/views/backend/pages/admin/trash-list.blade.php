@extends('backend.layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">All Users & Admins</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.trash_list') }}">Trash List</a></li>
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
                                <h5>All Trash List</h5>
                            </div>
                        </div>
                        <div class="chat-actions">
                            <a href="{{ route('admin.create') }}" class="btn btn-info btn-md">Add
                                New</a>
                            <a href="{{ route('admin.index') }}" class="btn btn-success btn-md">All Users</a>
                            <a href="{{ route('admin.trash_list') }}" class="btn btn-danger btn-md">Trash list</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <form style="overflow: hidden;" action="{{ route('admin.bulk_action') }}" method="post">
                            @csrf
                            <div class="dropdown show">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" width="20px"
                                    role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Bulk Action
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <button type="button" class="dropdown-item" data-toggle="modal" onclick="modalBulk(0)"
                                        data-target=".bd-example-modal-sm-action" href="#">Pernament Delete</button>

                                    <button type="button" class="dropdown-item" data-toggle="modal" onclick="modalBulk(1)"
                                        data-target=".bd-example-modal-sm-action" href="#"
                                        value="1">Restore</button>
                                </div>
                            </div>
                            <table id="print-table100" class="table custom-table">
                                <thead>
                                    <tr>
                                        <th data-orderable="false" width="10px"><input type="checkbox"
                                                id="chkSelectAll" />SL:</th>
                                        <th>Image</th>
                                        <th>Name/UserName</th>
                                        <th>Email/Mobile</th>
                                        <th>Role/Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($allAdmin as $key => $value)
                                        <tr>
                                            <td><input type="checkbox" name="chk[]" class="chkDel"
                                                    value="{{ $value->id }}" />{{ $loop->iteration }}</td>
                                            @if (!$value->image)
                                                <td><img src="{{ asset('assets/backend/images/pro.png') }}" alt="No Image"
                                                        width="50" /></td>
                                            @else
                                                <td><img src="{{ $value->image_url }}" alt="No Image" width="50" /> </td>
                                            @endif
                                            <td>
                                                {{ $value->name }}<br>
                                                {{ $value->username }}
                                            </td>
                                            <td>{{ $value->email }}<br>{{ $value->mobile }}</td>
                                            <td>
                                                @if ($value->role == 1)
                                                    <span class="badge badge-success">SuperAdmin</span>
                                                @else
                                                    <span class="badge badge-success">Admin</span>
                                                @endif
                                                <br>
                                                @if ($value->status == 1)
                                                    <span class="badge badge-info">Active</span>
                                                @else
                                                    <span class="badge badge-danger">InActive</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center text-danger" colspan="5">Trash is empty</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                            @include('backend.pages.extra.bulk-action')
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
