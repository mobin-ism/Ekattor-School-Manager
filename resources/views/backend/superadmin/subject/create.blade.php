<form method="POST" class="d-block ajaxForm" action="{{ route('subject.store') }}">
    @csrf

    <div class="form-group col-md-12">
        <label for="class">Class</label>
        <select name="class_id" id="class_id" class="form-control" required>
            <option value="">Class</option>
            @foreach (App\Classes::where('school_id', school_id())->get() as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
            @endforeach
        </select>
        <small id="class_help" class="form-text text-muted">Select Class.</small>
    </div>

    <div class="form-group col-md-12">
        <label for="name">Subject Name</label>
        <input type="text" class="form-control" id="name" name = "name" required>
        <small id="name_help" class="form-text text-muted">Provide Subject Title.</small>
    </div>

    <div class="form-group  col-md-12">
        <button class="btn btn-block btn-primary" type="submit">Add Subject</button>
    </div>
</form>

<script>
    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, classWiseSubject);
    });
</script>
