@extends('backend.layouts.app')
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Site Log</a></li>
    </ol>
</div>
<div class="main-container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="form-group">
                <a href="{{ url('/clear-log') }}" class="btn btn-info m-1" target="_blank">Log Clear</a>
            </div>
        </div>
    </div>
</div>
@endsection
