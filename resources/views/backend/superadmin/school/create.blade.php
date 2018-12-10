<form method="POST" class="d-block ajaxForm" action="{{ route('school.store') }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="name">School Name</label>
            <input type="text" class="form-control" id="name" name = "name" required>
            <small id="name_help" class="form-text text-muted">Provide School Name.</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Create School</button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").validate({});
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, 'school_content');
    });
</script>
