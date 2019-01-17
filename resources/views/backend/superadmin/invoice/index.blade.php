@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-file-document-box title_icon"></i> Student Fee Manager
                    <button type="button" class="btn btn-icon btn-success btn-rounded alignToTitle" onclick="showAjaxModal('{{ route('invoice.single.create') }}', 'Create Single Invoice')"> <i class="mdi mdi-plus"></i> Add Single Invoice</button>
                    <button type="button" class="btn btn-icon btn-primary btn-rounded alignToTitle" style="margin-right: 10px;" onclick="showAjaxModal('{{ route('invoice.mass.create') }}', 'Create Mass Invoices For A Section')"> <i class="mdi mdi-plus"></i> Add Mass Invoice</button>
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
                    
                    <div class="row justify-content-md-center" style="margin-bottom: 10px;">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <div class="form-group">
                                <div id="reportrange" class="form-control" data-toggle="date-picker-range" data-target-display="#selectedValue"  data-cancel-class="btn-light">
                                    <i class="mdi mdi-calendar"></i>&nbsp;
                                    <span id="selectedValue"></span> <i class="mdi mdi-menu-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <button type="button" class="btn btn-icon btn-secondary form-control" onclick="showAllInvoices()">Filter</button>
                        </div>
                    </div>
                    
                    <div class="table-responsive-sm" id = "invoice_content">
                        @include('backend.'.Auth::user()->role.'.invoice.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection


@section('scripts')
<script>
    var showAllInvoices = function () {
        var url = '{{ route("invoice.list") }}';

        $.ajax({
            type : 'GET',
            url: url,
            data : {date : $('#selectedValue').text()},
            success : function(response) {
                $('#invoice_content').html(response);
                $('.page-item').each(function(i, el){
                    if($(el).find('a').attr('href')){
                        var string = $(el).find('a').attr('href');
                        string = string.replace("_list", "");
                        $(el).find('a').attr('href', string);
                    }
                });
            }
        });
    }
</script>
@endsection