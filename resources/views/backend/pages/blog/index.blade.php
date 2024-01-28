@extends('backend.layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">All Blog</a></li>
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
                                <h5>All Blog</h5>
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
                    <div class="table-responsive">
                        <table id="print-table1" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>SL:</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>CreatedBy</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allBlog as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ $value->image_url['thumnail'] ?? '' }}" alt="No Image"
                                                id="imgload" width="50" />
                                        </td>
                                        <td>{{ $value->title }}</td>
                                        <td>{{ $value->category->title }}</td>
                                        <td>{{ $value->createdby->name }} <br> </td>
                                        <td>
                                            <span class="badge badge-info">{{ $value->status }}</span>
                                        </td>
                                        @can('Admin')
                                            <td>
                                                <a href="{{ route('blog.edit', $value->id) }}" title="Edit Blog"><span
                                                        class="btn btn-info btn-sm"><i class="icon-edit1"></i></span></a>
                                                <button type="button" class="btn btn-danger btn-sm delete-id"
                                                    id="{{ $value->id }}" data-toggle="modal"
                                                    data-target=".bd-example-modal-sm" onclick="modalview(this.id)"
                                                    title="Trash Blog"><i class="icon-x"></i>
                                                </button>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <!-- ################# Small modal ####################-->
                        @include('backend.pages.blog.trash-modal')
                        <!-- ################# Small modal ####################-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
