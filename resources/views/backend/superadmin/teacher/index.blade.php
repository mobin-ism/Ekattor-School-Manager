@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box ">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> Teacher
                <button type="button" class="btn btn-icon btn-success alignToTitle" onclick="showAjaxModal('{{ route('teacher.create') }}', 'Create New Teacher')"> <i class="mdi mdi-plus"></i> Add New Teacher</button>
                </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div style="margin-bottom: 10px;">
                        <div class="row justify-content-md-center">
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3 mb-lg-0">
                                <select class="form-control select2" data-toggle="select2" name="department_id" id="department_id">
                                    <option value="all">All Department</option>
                                    @foreach (App\Department::where('school_id', get_settings('selected_branch'))->get() as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
                                <button type="button" class="btn btn-icon btn-secondary form-control" onclick="departmentWiseFilter()">Filter</button>
                            </div>
                        </div>
                    </div>
                    <div id = "teacher_content">
                        @include('backend.'.Auth::user()->role.'.teacher.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

    {{-- <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="row justify-content-md-center">
                                <div class="col-lg-3 mb-3 mb-lg-0"> <button type="button" class="btn btn-icon btn-secondary form-control"> <i class="mdi mdi-table-search"></i></button></div>
                                <div class="col-lg-1 mb-3 mb-lg-0"> <button type="button" class="btn btn-icon btn-secondary form-control"> <i class="mdi mdi-table-search"></i></button></div>
                            </div>
                        </div>
                        <div class="ml-auto col-lg-2 mb-3 mb-lg-0"> <button type="button" class="btn btn-icon btn-secondary form-control"> <i class="mdi mdi-table-search"></i> Add New Teacher</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@section('scripts')
    <script>
        var departmentWiseFilter = function() {
            var department_id = $('#department_id').val();
            var url = '{{ route("teacher.show", "department_id") }}';
            url = url.replace('department_id', department_id);

            $.ajax({
                type : 'GET',
                url: url,
                success : function(response) {
                    $('#teacher_content').html(response);
                }
            });
        }
    </script>
@endsection
