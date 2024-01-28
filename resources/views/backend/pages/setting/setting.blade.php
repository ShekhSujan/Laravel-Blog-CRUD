@extends('backend.layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('setting') }}">Site Settings</a></li>
        </ol>
    </div>
    <div class="main-container">
        <div class="row gutters">
            @include('backend.pages.extra.message')
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card m-0">
                    <div class="card-header">
                        <div class="active-user-chatting">
							<div class="active-user-info">
								<div class="avatar-info">
								    <h5>Update Setting</h5>
								</div>
							</div>
						</div>
                    </div>
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                                        role="tab" aria-controls="v-pills-home" aria-selected="true">
                                        Logo
                                    </a><br>


                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">

                                <div class="tab-content" id="v-pills-tabContent">
                                    @include('backend.pages.setting.components.logo')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
