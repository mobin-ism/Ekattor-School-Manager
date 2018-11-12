@extends('backend.installation.layout')
@section('content')
<h4 class="header-title">System Settings</h4>
<p class="text-muted font-13">
        <form method="POST" action="#">
                @csrf
                <div class="form-group">
                    <label for="db_host">System Name</label>
                    <input type="text" class="form-control" id="db_host" name = "DB_HOST">
                    <input type="hidden" name = "types[]" value="DB_HOST">
                    <small id="DB_HOST_HELP" class="form-text text-muted">Provide a system name here.</small>
                </div>

                <button type="submit" class="btn btn-info">Submit</button>
            </form>
</p>
@endsection
