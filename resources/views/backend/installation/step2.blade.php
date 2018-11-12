@extends('backend.installation.layout')
@section('content')
    <h4 class="header-title">Purchase Code</h4>
    <p class="text-muted font-13">
            <form method="POST" action="">
                    @csrf
                    <div class="form-group">
                        <label for="purchase_code">Purchase Code</label>
                        <input type="text" class="form-control" id="db_purchase_codehost" name = "purchase_code">
                        <small id="purchase_code_help" class="form-text text-muted">Provide your codecanyon purchase code.</small>
                        <small id="purchase_code_link" class="form-text text-muted"><a href="">Where to get purchase code?</a></small>
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
    </p>
@endsection
