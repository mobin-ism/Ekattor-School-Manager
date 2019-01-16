@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> Parent <button type="button" class="btn btn-icon btn-success mb-1 alignToTitle" onclick="showAjaxModal('{{ route('parent.create') }}', 'Create Parent')"> <i class="mdi mdi-plus"></i> Add New Parent</button></h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id = "parent_content">
                        @include('backend.'.Auth::user()->role.'.parent.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection
