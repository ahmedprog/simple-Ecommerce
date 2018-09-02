<!DOCTYPE html>
<html>
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="">
   <meta name="author" content="">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>Penta Levels</title>
   <link href="{{ asset('cpanel/css/bootstrap.min.css') }}" rel="stylesheet">
   <link href="{{ asset('cpanel/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
   {{--dataTables--}}
   <link href="{{ asset('cpanel/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
   <link href="{{ asset('cpanel/css/plugins/dataTables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

   <link href="{{ asset('cpanel/css/animate.css') }}" rel="stylesheet">
   <link href="{{ asset('cpanel/css/style.css') }}" rel="stylesheet">

   <link href="{{ asset('cpanel/css/plugins/colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
   <link href="{{ asset('cpanel/css/plugins/cropper/cropper.min.css') }}" rel="stylesheet">
   {{--summernote--}}
   <link href="{{ asset('cpanel/css/plugins/summernote/summernote.css') }}" rel="stylesheet">
   <link href="{{ asset('cpanel/css/plugins/summernote/summernote-bs3.css') }}" rel="stylesheet">
   {{--jasny--}}
   <link href="{{ asset('cpanel/css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
   {{--iCheck--}}
   <link href="{{ asset('cpanel/css/plugins/iCheck/all.css') }}" rel="stylesheet">

   <!-- Sweet Alert -->
   <link href="{{ asset('cpanel/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('cpanel/css/fakeLoader.css') }}">

   <link rel="icon" href="{{ asset('cpanel/img/logo-tab.png') }}">

  @yield('css')
</head>