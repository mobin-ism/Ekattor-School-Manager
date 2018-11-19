@extends('backend.installation.layout')
@section('content')
<h4 class="header-title">Congratulations!!!</h4>
<p class="text-muted font-13">
<a href="{{ route('login') }}" class="btn btn-success">Login here</a>
</p>
@endsection
