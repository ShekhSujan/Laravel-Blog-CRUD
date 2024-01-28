@extends('backend.layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            @can('Admin')
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Edit Users</a></li>
            @endcan

        </ol>
    </div>
    <div class="main-container">
        <div class="row  gutters">
            @include('backend.pages.extra.message')
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="active-user-chatting">
                            <div class="active-user-info">
                                <div class="avatar-info">
                                    <h5>Edit User</h5>
                                </div>
                            </div>
                            <div class="chat-actions">
                                @can('Admin')
                                    <a href="{{ route('admin.create') }}" class="btn btn-info btn-md">Add New</a>
                                    <a href="{{ route('admin.index') }}" class="btn btn-success btn-md">All Users</a>
                                    <a href="{{ route('admin.trash_list') }}" class="btn btn-danger btn-md">Trash list</a>
                                @endcan
                            </div>
                        </div>


                        <form action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $selected->id }}">
                            <input type="hidden" name="image_name" value="{{ $selected->image }}">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $selected->name }}" placeholder="Enter Name" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Enter Email</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="email" class="form-control"
                                                value="{{ $selected->email }}" placeholder="Enter Email" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">User Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="username" class="form-control"
                                                value="{{ $selected->username }}" placeholder="Enter username" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="input-email">Enter Mobile</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="mobile" class="form-control"
                                                value="{{ $selected->mobile }}" placeholder="Enter Mobile" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="input-email">Role</label>

                                        <div class="col-sm-6">
                                            <select class="form-control" name="role" required>
                                                <option @selected($selected->role->value == 'superadmin') value="{{ 'superadmin' }}">SuperAdmin
                                                </option>
                                                <option @selected($selected->role->value == 'admin') value="{{ 'admin' }}">Admin
                                                </option>
                                                <option @selected($selected->role->value == 'user') value="{{ 'user' }}">User
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2" for="input-email">Status</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" name="status" required>
                                                <option value="{{ 'active' }}" @selected($selected->status->value == 'active')>Active </option>
                                                <option value="{{ 'inactive' }}" @selected($selected->status->value == 'inactive')>Inactive  </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2" for="input-email">Upload Image <span
                                                class="text-danger">[200 * 200]</span></label>
                                        <div class="col-sm-6">
                                            <input class="form-control dropify" data-bs-height="100"
                                                data-default-file="{{ $selected->image_url }}" name="image"
                                                type="file">
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-md btn-block"
                                            data-toggle="modal" data-target=".bd-example-modal-sm-update">Update
                                            Admin</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- ################# Small modal ####################-->
                    @include('backend.pages.modal.update-modal')
                    <!-- Main container end -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
