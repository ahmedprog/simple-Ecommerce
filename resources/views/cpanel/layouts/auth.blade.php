<!DOCTYPE html>
<html lang="en">

<head>
    @include('cpanel.partials.head')
</head>

<body class="page-header-fixed">

    {{--<div style="margin-top: 10%;"></div>--}}

    <div >
        @yield('content')
    </div>

    <div class="scroll-to-top"
         style=" display: none; ">
        <i class="fa fa-arrow-up"></i>
    </div>

    @include('cpanel.partials.javascripts')

</body>
</html>