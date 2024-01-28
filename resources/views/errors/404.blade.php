@extends('backend.layouts.app')
@section('content')

<div class="error-area">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="error pt-5">
                    <img class="error-image" src="{{asset("assets/frontend/img/error.png")}}" alt="image">
                    <h2>Page Not Found</h2>
                    <div class="error-btn">
                        <a href="{{route('dashboard')}}">Back To Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
