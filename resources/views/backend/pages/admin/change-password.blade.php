@extends('backend.layouts.app')
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        @can('Admin')
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">All Users</a></li>
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
								    <h5>Change Password</h5>
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
                    

                    <form action="{{route('admin.update_password')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$id}}"/>
                        <div class="row gutters">
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="input-email">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="input-email">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <hr>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                        data-target=".bd-example-modal-sm-update">Change password</button>
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
