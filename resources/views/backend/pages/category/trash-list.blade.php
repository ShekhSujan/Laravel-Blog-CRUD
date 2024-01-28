@extends('backend.layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category.index') }}">All Category</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category.trash_list') }}">Trash List</a></li>
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
                                <h5>Blog Trash</h5>
                            </div>
                        </div>
                        <div class="chat-actions">
                            <a href="{{ route('category.create') }}" class="btn btn-info btn-md">Add New</a>
                            <a href="{{ route('category.index') }}" class="btn btn-success btn-md">All Category</a>
                            <a href="{{ route('category.trash_list') }}" class="btn btn-danger btn-md">Trash
                                list</a>
                        </div>
                    </div>
                    <div class="table-responsive">

                        <form style="overflow: hidden;" action="{{ route('category.bulk_action') }}" method="post">
                            @csrf
                            @include('backend.pages.extra.trash-button')
                            <table id="print-table100" class="table custom-table">
                                <thead>
                                    <tr>
                                        <th data-orderable="false" width="10px"><input type="checkbox"
                                                id="chkSelectAll" />SL:</th>
                                        <th>Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($allCategory as $key =>$value)
                                        <tr>
                                            <td><input type="checkbox" name="chk[]" class="chkDel"
                                                    value="{{ $value->id }}" />{{ $loop->iteration }}</td>
                                            <td>{{ $value->title }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center text-danger" colspan="2">Trash is empty</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                            @include('backend.pages.extra.bulk-action')
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
