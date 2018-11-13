<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Hyper - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/images/favicon.ico')}}">
    @include('backend.layout.styles')
</head>

<body>

<!-- Begin page -->
<div class="wrapper">

    @include('backend.admin.navigation')

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            @include('backend.layout.header')

            <!-- Start Content-->
            <div class="container-fluid">

                @yield('content')

            </div>
            <!-- container -->

        </div>
        <!-- content -->

        @include('backend.layout.footer')

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

@include('backend.admin.right_navigation')
@include('backend.layout.scripts')
@include('backend.layout.modal')
@include('backend.layout.ajax_form')
@yield('scripts')
</body>
</html>
