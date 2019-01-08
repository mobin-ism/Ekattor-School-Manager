@php
    if($settings_type == 'system')
        $class = 'col-xl-12';
    else if($settings_type == 'payment')
        $class = 'col-xl-10 offset-xl-1';
    else if($settings_type == 'language')
        $class = 'col-xl-10 offset-xl-1';
    else if($settings_type == 'sms')
        $class = 'col-xl-10 offset-xl-1';
@endphp

@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-settings title_icon"></i>{{ ucfirst($settings_type) }} Settings</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div id = "settings_content" class="{{ $class }}">
            @include('backend.'.Auth::user()->role.'.settings.'.$settings_type)
        </div>
    </div>
@endsection


@section('scripts')
    <script>            
            function updateSystemInfo() {
                $(".systemAjaxForm").validate({});
                $(".systemAjaxForm").submit(function(e) {
                    var form = $(this);
                    ajaxSubmit(e, form, 'settings_content');
                });
            }

            function updateSystemLogo() {
                $(".systemLogoAjaxForm").validate({});
                $(".systemLogoAjaxForm").submit(function(e) {
                    var form = $(this);
                    ajaxSubmit(e, form, 'settings_content');
                });
            }
    </script>
@endsection
