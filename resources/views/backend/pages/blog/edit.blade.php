@extends('backend.layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Edit Blog</a></li>
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
                                    <h5>Edit Blog</h5>
                                </div>
                            </div>
                            <div class="chat-actions">
                                <a href="{{ route('blog.create') }}" class="btn btn-info btn-md">Add New</a>
                                <a href="{{ route('blog.index') }}" class="btn btn-success btn-md">All Blog</a>
                                @can('Admin')
                                <a href="{{ route('blog.trash_list') }}" class="btn btn-danger btn-md">Trash list</a>
                            @endcan
                            </div>
                        </div>
                        <form action="{{ route('blog.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $selected->id }}">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-toggle="tab"
                                        data-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                        aria-selected="true"><span class="badge badge-danger">Step : 1</span>
                                        Attributes</button>
                                    <button class="nav-link" id="nav-profile-tab" data-toggle="tab"
                                        data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                        aria-selected="false"><span class="badge badge-danger">Step : 2</span>
                                        Description</button>
                                    <button class="nav-link" id="nav-contact-tab" data-toggle="tab"
                                        data-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                                        aria-selected="false"><span class="badge badge-danger">Step : 3</span> SEO</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group row">
                                                <label class="col-sm-2" for=" title">Title <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="title" class="form-control"
                                                        value="{{ $selected->title }}" placeholder="Enter Title" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group row">
                                                <label class="col-sm-2" for=" short_description">Short Description <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <textarea name="short_description" class="form-control" placeholder="Enter Short Description">{{ $selected->short_description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group row">
                                                <label class="col-sm-2" for=" package_id">Category <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="category_id" required>
                                                        @foreach ($allCategory as $value)
                                                            @if ($value->id == $selected->category_id)
                                                                <option selected value="{{ $value->id }}">
                                                                    {{ $value->title }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $value->id }}">{{ $value->title }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group row">
                                                <label class="col-sm-2" for="tag">Tag</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="tag" data-role="tagsinput"
                                                        class="form-control" value="{{ $selected->tag }}"
                                                        placeholder="Enter tag" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="input-email">Upload
                                                    Image <span class="text-danger">[1920 * 1080 Recomended]</span></label>
                                                <div class="col-sm-6">
                                                    <input class="form-control dropify" data-bs-height="100"
                                                        data-default-file="{{$selected->image_url['thumnail']??'' }}"
                                                        id="imgInp" name="image" type="file">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group row">
                                                <label class="col-sm-2" for="image_source">Image Source</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="image_source" class="form-control"
                                                        value="{{ $selected->image_source }}"
                                                        placeholder="Image Source" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group row">
                                                <label class="col-sm-2" for="content_source">Content Source</label>
                                                <div class="col-sm-8">
                                                    <textarea name="content_source" class="form-control" value="" placeholder="Enter Content Source">{{ $selected->content_source }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2" for="status">Status</label>
                                                <div class="col-sm-4">
                                                    <select class="form-control" name="status" required>
                                                        <option value="{{ 'active' }}" @selected($selected->status->value == 'active')>Active
                                                        </option>
                                                        <option value="{{ 'inactive' }}" @selected($selected->status->value == 'inactive')>Inactive
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group row justify-content-center">
                                                <h6>Description</h6>
                                                <div class="col-sm-12">
                                                    <textarea name="description" class="form-control summernote" value="" placeholder="Enter Description">{{ $selected->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                    aria-labelledby="nav-contact-tab">
                                    <div class="row gutters">
                                        @include('backend.pages.extra.meta-edit')

                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <button type="button" class="btn btn-primary btn-md btn-block"
                                            data-toggle="modal" data-target=".bd-example-modal-sm-update">Update
                                            Blog</button>
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
