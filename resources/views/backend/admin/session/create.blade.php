<form method="POST" class="d-block" action="{{ route('session_manager.store') }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="session_title">Session Title</label>
            <input type="text" class="form-control" id="session_title" name = "session_title">
            <small id="session_title_help" class="form-text text-muted">Provide Session Title.</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Create session</button>
        </div>
    </div>
</form>