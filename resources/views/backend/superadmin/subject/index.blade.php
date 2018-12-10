@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-book-open-page-variant title_icon"></i> Subject</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-10 offset-xl-1">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-icon btn-success" style="float: right;" onclick="showAjaxModal('{{ route('subject.create') }}', 'Add New Subject')"> <i class="mdi mdi-plus"></i>Add Subject</button>
                    <h4 class="header-title mt-3">Subject List</h4>
                    <div class="row justify-content-md-center" style="margin-bottom: 10px;">
                        <div class="col-md-4">
                            <select class="form-control" name="class_id" id="class_id" onchange="classWiseSubject(this.value)">
                                <option value="all">All Class</option>
                                @foreach (App\Classes::where('school_id', 1)->get() as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive-sm" id = "subject_content">
                        @include('backend.'.Auth::user()->role.'.subject.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
    <script>
        function classWiseSubject(class_id) {
            var url = '{{ route("subject.show", "class_id") }}';
            url = url.replace('class_id', class_id);
            $.ajax({
                type : 'GET',
                url: url,
                success : function(response) {
                    $('#subject_content').html(response);
                }
            });
        }
    </script>
@endsection
