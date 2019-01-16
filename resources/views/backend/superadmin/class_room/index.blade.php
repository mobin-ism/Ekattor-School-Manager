@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-library title_icon"></i> Class Room <button type="button" class="btn btn-icon btn-success alignToTitle" onclick="showAjaxModal('{{ route('room.create') }}', 'Create New Class Room')"> <i class="mdi mdi-plus"></i> Add Class Room</button></h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id = "room_content">
                        @include('backend.'.Auth::user()->role.'.class_room.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection
