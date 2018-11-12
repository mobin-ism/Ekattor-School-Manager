<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Hyper - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    @include('backend.layout.styles')
</head>

<body>

<!-- Begin page -->
<div class="wrapper">
    <!-- Start Page Content here -->
    <div class="content-page" style="margin-left: 0px;">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Ekattor School Management System -Laravel Version</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                    @yield('content')
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row -->

            </div>
            <!-- container -->
        </div>
        <!-- content -->
        @include('backend.layout.footer')

    </div>
    <!-- End Page content -->
</div>
<!-- END wrapper -->
@include('backend.layout.scripts')
@yield('scripts')
</body>
</html>
