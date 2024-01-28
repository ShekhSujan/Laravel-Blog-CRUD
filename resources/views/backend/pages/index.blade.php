@extends('backend.layouts.app')
@section('content')
    <!-- Page header start -->
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active"> Dashboard</li>
        </ol>
    </div>
    <!-- Page header end -->

    <!-- Main container start -->
    <div class="main-container">
        <!-- Row start -->
        <div class="row gutters justify-content-center">
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
                <div class="info-stats4">
                    <div class="info-icon">
                        <i class="icon-user1"></i>
                    </div>
                    <div class="sale-num">
                        <h6>{{ $allAdmin }}</h6>
                        <p>Admins</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
                <div class="info-stats4">
                    <div class="info-icon">
                        <i class="icon-list"></i>
                    </div>
                    <div class="sale-num">
                        <h6>{{ $allCategory }}</h6>
                        <p>Categories</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
                <div class="info-stats4">
                    <div class="info-icon">
                        <i class="icon-list"></i>
                    </div>
                    <div class="sale-num">
                        <h6>{{ $allBlog }}</h6>
                        <p>Blogs</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
