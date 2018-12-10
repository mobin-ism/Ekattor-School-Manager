<form method="POST" class="d-block ajaxForm" action="{{ route('school.update', $school->id) }}">
    @csrf
    @method('PATCH')
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="name">School Name</label>
            <input type="text" class="form-control" id="name" name = "name" value="{{ $school->name }}" required>
            <small id="name_help" class="form-text text-muted">Provide School Name.</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Update school</button>
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

