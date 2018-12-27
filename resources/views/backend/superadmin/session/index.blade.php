@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-calendar-range title_icon"></i> Session</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-10 offset-xl-1">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-md-center" style = "margin-bottom: 10px;">
                        <div class="col-4">
                            <select class="form-control select2" data-toggle="select2" id = "session_dropdown">
                                <option value = "0">Session List</option>
                                @foreach (App\Session::where('school_id', school_id())->get() as $session)
                                    <option value="{{ $session->id }}" @if($session->id == get_settings('running_session')) selected @endif>{{ $session->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-icon btn-secondary" style="float: right;" onclick="makeSessionActive()"> <i class="mdi mdi-check"></i> Activate</button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-icon btn-success" style="float: right;" onclick="showAjaxModal('{{ route('session_manager.create') }}', 'Create New Session')"> <i class="mdi mdi-plus"></i> Add Session</button>
                    <h4 class="header-title mt-3">Session List</h4>
                    <div class="table-responsive-sm" id = "session_content" style = "margin-top: 25px;">
                        @include('backend.'.Auth::user()->role.'.session.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection


@section('scripts')
<script>
    function makeSessionActive() {
        var session_id = $('#session_dropdown').val();
        if (session_id > 0) {
            var url = '{{ route("session.active", "session_id") }}';
            url = url.replace('session_id', session_id);
            $.ajax({
                    type : 'GET',
                    url: url,
                    success : function(response) {
                        $('#session_content').html(response.view);
                        (response.status === true) ? toastr.success(response.notification) : toastr.error(response.notification);
                    }
            });
        }else {
            toastr.error('No Session has been selected');
        }
    }
</script>
@endsection
