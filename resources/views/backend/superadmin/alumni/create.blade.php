<form method="POST" class="d-block ajaxForm" action="{{ route('alumni.store') }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name = "name" required>
            <small id="name_help" class="form-text text-muted">Provide Alumnus Name.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name = "email" required>
            <small id="email_help" class="form-text text-muted">Provide Alumnus Email.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name = "phone" required>
            <small id="phone_help" class="form-text text-muted">Provide Alumnus Phone Number.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="session">Session</label>
            <input type="text" class="form-control" id="session" name = "session" required>
            <small id="session_help" class="form-text text-muted">Provide Passing Session.</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Add Alumnus</button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").validate({});
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, 'alumni_content');
    });
</script>
