@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-file-document-box title_icon"></i> Student Fee Manager
                    <button type="button" class="btn btn-icon btn-success alignToTitle" onclick="showAjaxModal('{{ route('invoice.single.create') }}', 'Create Single Invoice')"> <i class="mdi mdi-plus"></i> Add Single Invoice</button>
                    <button type="button" class="btn btn-icon btn-primary alignToTitle" style="margin-right: 10px;" onclick="showAjaxModal('{{ route('invoice.mass.create') }}', 'Create Mass Invoices')"> <i class="mdi mdi-plus"></i> Add Mass Invoice</button>
                </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-3">Student Fee Report</h4>
                    <div class="table-responsive-sm" id = "invoice_content">
                        @include('backend.'.Auth::user()->role.'.invoice.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection
