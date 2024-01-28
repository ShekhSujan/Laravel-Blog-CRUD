@extends('backend.layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category.index') }}">All category</a></li>
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
                                <h5>All Blog Category</h5>
                            </div>
                        </div>
                        <div class="chat-actions">
                            <a href="{{ route('category.create') }}" class="btn btn-info btn-md">Add
                                New</a>
                            <a href="{{ route('category.index') }}" class="btn btn-success btn-md">All category</a>
                            @can('Admin')
                                <a href="{{ route('category.trash_list') }}" class="btn btn-danger btn-md">Trash list</a>
                            @endcan
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="print-table100" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>SL:</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allCategory as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $value->title }}
                                        </td>
                                        <td> <img src="{{ $value->image_url }}" alt="No Image" id="imgload"
                                                width="50" />
                                        </td>
                                        <td><span class="badge badge-info"> {{ $value->status }}</span></td>
                                        <td>
                                            <a href="{{ route('category.edit', $value->id) }}" title="Edit Row"><span
                                                    class="btn btn-info btn-md"><i class="icon-edit1"></i></span></a>
                                            @can('Admin')
                                                <button type="button" class="btn btn-danger btn-md delete-id"
                                                    id="{{ $value->id }}" data-toggle="modal"
                                                    data-target=".bd-example-modal-sm" onclick="modalview(this.id)"
                                                    title="Trash Row"><i class="icon-x"></i>
                                                </button>
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <!-- ################# Small modal ####################-->
                        @include('backend.pages.category.trash-modal')
                        <!-- ################# Small modal ####################-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
