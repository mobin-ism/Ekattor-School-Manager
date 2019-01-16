@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"><i class="mdi mdi-account-circle title_icon"></i> Librarian <button type="button" class="btn btn-icon btn-success alignToTitle" onclick="showAjaxModal('{{ route('librarian.create') }}', 'Create Librarian')"> <i class="mdi mdi-plus"></i> Add New Librarian</button></h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id = "librarian_content">
                        @include('backend.'.Auth::user()->role.'.librarian.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection
