@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"><i class="mdi mdi-book-open-page-variant title_icon"></i> Class <button type="button" class="btn btn-icon btn-success mb-1 alignToTitle" onclick="showAjaxModal('{{ route('class.create') }}', 'Create Class')"> <i class="mdi mdi-plus"></i>Add Class</button></h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id = "class_content">
                        @include('backend.'.Auth::user()->role.'.class.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection
