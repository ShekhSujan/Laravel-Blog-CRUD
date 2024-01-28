@extends('backend.layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Add New Category</a></li>
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
                                    <h5>Add New Category</h5>
                                </div>
                            </div>
                            <div class="chat-actions">
                                <a href="{{ route('category.create') }}" class="btn btn-info btn-md">Add New</a>
                                <a href="{{ route('category.index') }}" class="btn btn-success btn-md">All Category</a>
                                @can('Admin')
                                <a href="{{ route('category.trash_list') }}" class="btn btn-danger btn-md">Trash list</a>
                            @endcan
                            </div>
                        </div>
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="input-email">Title <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="title" class="form-control"
                                                value="{{ old('title') }}" placeholder="Enter Title" required />
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="input-email">Upload Image <span
                                                class="text-danger">[300,300]</span></label>
                                        <div class="col-sm-4">
                                            <input class="form-control dropify" data-bs-height="100" name="image"
                                                type="file">
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                @include('backend.pages.extra.meta-create')
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <button type="submit" name="submit" class="btn btn-primary btn-md btn-block">Save
                                        Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
