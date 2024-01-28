<!doctype html>
<html lang="en">

<head>
    @include('backend.components.meta')
    @include('backend.components.css')
</head>

<body>
    <div class="page-wrapper">
        @include('backend.components.leftbar')
        <div class="page-content">
            @include('backend.components.topbar')
            @yield('content')
        </div>
    </div>
    @include('backend.components.js')
</body>

</html>
