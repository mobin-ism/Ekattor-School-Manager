@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-database title_icon"></i> Expense Category</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-10 offset-xl-1">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-icon btn-success" style="float: right;" onclick="showAjaxModal('{{ route('expense_category.create') }}', 'Create New Exam')"> <i class="mdi mdi-plus"></i> Add Expense Category</button>
                    <h4 class="header-title mt-3">Expense Category List</h4>
                    <div class="table-responsive-sm" id = "expense_category_content">
                        @include('backend.'.Auth::user()->role.'.expense_category.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection
