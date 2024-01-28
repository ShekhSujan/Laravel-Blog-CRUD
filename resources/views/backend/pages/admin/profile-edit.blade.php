@extends('backend.layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">{{ auth()->user()->name }}</a></li>
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
                                    <h5>Edit Profile: {{ auth()->user()->name }}</h5>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
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
                                        <label for="" class="col-sm-2 col-form-label">Email Address</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="email" class="form-control"
                                                value="{{ $selected->email }}" placeholder="Enter Email" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">User Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="username" class="form-control"
                                                value="{{ $selected->username }}" placeholder="Enter username" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="input-email">Mobile No.</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="mobile" class="form-control"
                                                value="{{ $selected->mobile }}" placeholder="Enter Mobile" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2" for="input-email">Upload Image <br><span
                                                class="text-danger">[ 200px X 200px ]</span></label>
                                        <div class="col-sm-6">
                                            <input class="form-control dropify" data-bs-height="100"
                                                data-default-file="{{$selected->image_url}}"
                                                name="image" type="file">
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-md btn-block" data-toggle="modal"
                                            data-target=".bd-example-modal-sm-update">Update
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
