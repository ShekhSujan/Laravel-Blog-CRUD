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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="active-user-chatting">
							<div class="active-user-info">
								<div class="avatar-info">
								    <h5>Create new user</h5>
								</div>
							</div>
							<div class="chat-actions">
								<a href="{{ route('admin.create') }}" class="btn btn-info btn-sm">Add New</a>
                            <a href="{{ route('admin.index') }}" class="btn btn-success btn-sm">All Users</a>
                            <a href="{{ route('admin.trash_list') }}" class="btn btn-danger btn-sm">Trash list</a>
							</div>
						</div>
                        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name') }}" placeholder="Enter Name" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Email Address</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="email" class="form-control"
                                                value="{{ old('email') }}" placeholder="Enter Email" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">User Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="username" class="form-control"
                                                value="{{ old('username') }}" placeholder="Enter username" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="input-email">Mobile No.</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="mobile" class="form-control"
                                                value="{{ old('mobile') }}" placeholder="Enter Mobile" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="input-email">Password</label>
                                        <div class="col-sm-6">
                                            <input type="password" name="password" class="form-control"
                                                value="{{ old('password') }}" placeholder="Enter Password" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="input-email">Confirm Password</label>
                                        <div class="col-sm-6">
                                            <input type="password" name="password_confirmation"
                                                placeholder="Confirm Password" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="input-email">Role</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" name="role" required>
                                                <option value="superadmin">SuperAdmin</option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="input-email">Upload Image<br><span class="text-danger">[ 200px X 200px ]</span></label>
                                        <div class="col-sm-6">
                                            <input class="form-control dropify" data-bs-height="100"  name="image" type="file">
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <button type="submit" name="submit" class="btn btn-primary btn-md btn-block">Save
                                        User</button>

                                </div>
                            </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
