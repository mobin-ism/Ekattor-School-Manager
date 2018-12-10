@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-account-group title_icon"></i> Class Routine</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-icon btn-success" style="float: right;" onclick="showAjaxModal('{{ route('routine.create') }}', 'Add Routine')"> <i class="mdi mdi-plus"></i>Add Routine</button>
                    <h4 class="header-title mt-3">Class Schedule Of Single Week</h4>
                    <div class="row justify-content-md-center" style="margin-bottom: 10px;">
                        <div class="col-md-4">
                            <select class="form-control" name="class_id" id="class_id" onchange="classWiseSection(this.value)">
                                <option value="all">Class</option>
                                @foreach (App\Classes::where('school_id', 1)->get() as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id = "section_content" class="col-md-4">
                            <select class="form-control" name="section_id" id="section_id">
                                <option value="all">Select Class First</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive-sm" id = "routine_content">
                        @include('backend.'.Auth::user()->role.'.routine.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
    <script>
        function classWiseSection(class_id) {
            var url = '{{ route("section.show", "class_id") }}';
            url = url.replace('class_id', class_id);

            $.ajax({
                type : 'GET',
                url: url,
                success : function(response) {
                    $('#section_content').html(response);
                }
            });
        }

        function onChangeSection(section_id) {
          if(section_id > 0) {
            var url = '{{ route("routine.show", "section_id") }}';
            url = url.replace('section_id', section_id);
            $.ajax({
                type : 'GET',
                url: url,
                success : function(response) {
                    $('#routine_content').html(response);
                }
            });
          }
        }
    </script>
@endsection
