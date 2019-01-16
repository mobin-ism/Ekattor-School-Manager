@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-content-paste title_icon"></i> Department <button type="button" class="btn btn-icon btn-success mb-1 alignToTitle" onclick="showAjaxModal('{{ route('department.create') }}', 'Create Department')"> <i class="mdi mdi-plus"></i> Add New Department</button></h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id = "department_content">
                        @include('backend.'.Auth::user()->role.'.department.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection
