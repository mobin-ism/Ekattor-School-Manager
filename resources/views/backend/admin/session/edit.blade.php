<form method="POST" class="d-block ajaxForm" action="{{ route('session_manager.update', $session->id) }}">
    @csrf
    @method('PATCH')
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="session_title">Session Title</label>
            <input type="text" class="form-control" id="session_title" name = "session_title" value="{{ $session->name }}">
            <small id="session_title_help" class="form-text text-muted">Provide Session Title.</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Create session</button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, 'session_content');
    });
</script>

