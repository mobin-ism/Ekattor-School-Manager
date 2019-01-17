@extends('backend.layout.main')
@section('content')
@php
    $title = "Dashboard | ".get_settings('system_title');
@endphp
<title>{{ $title }}</title>
@endsection
