@extends('backend.layout.layout')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Librarian</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-icon btn-success" style="float: right;" onclick="showAjaxModal('{{ route('librarian.create') }}')"> <i class="mdi mdi-plus"></i> Add New Librarian</button>
                    <h4 class="header-title mt-3">Librarian List</h4>
                    <div class="table-responsive-sm" id = "librarian_content">
                        @include('backend.admin.librarian.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection
