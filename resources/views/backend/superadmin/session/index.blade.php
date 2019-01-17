@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-calendar-range title_icon"></i> Session
                    <button type="button" class="btn btn-icon btn-success btn-rounded alignToTitle" onclick="showAjaxModal('{{ route('session_manager.create') }}', 'Create New Session')"> <i class="mdi mdi-plus"></i> Add Session</button>
                </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div id = "session_content">
                @include('backend.'.Auth::user()->role.'.session.list')
            </div>
        </div>
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
