<form method="POST" class="d-block ajaxForm" action="{{ route('exam.update', $exam->id) }}">
    @csrf
    @method('PATCH')
    <div class="form-group col-md-12">
        <label for="name">Exam Name</label>
        <input type="text" class="form-control" id="name" name = "name" value="{{ $exam->name }}" required>
        <small id="name_help" class="form-text text-muted">Provide Exam Name.</small>
    </div>

    <div class="form-group col-md-12">
        <label for="starting_date">Exam Starting Date</label>
        <input type="text" class="form-control date" id="starting_date" data-toggle="date-picker" data-single-date-picker="true" name = "starting_date" value="{{ date('m/d/Y', $exam->starting_date) }}" required>
        <small id="date_help" class="form-text text-muted">Provide Exam Date.</small>
    </div>

    <div class="form-group col-md-12">
        <label for="ending_date">Exam Ending Date</label>
        <input type="text" class="form-control date" id="ending_date" data-toggle="date-picker" data-single-date-picker="true" name = "ending_date" value="{{ date('m/d/Y', $exam->ending_date) }}" required>
        <small id="date_help" class="form-text text-muted">Provide Exam Date.</small>
    </div>

    <div class="form-group  col-md-12">
        <button class="btn btn-block btn-primary" type="submit">Update Exam</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#starting_date').daterangepicker();
        $('#ending_date').daterangepicker();
    });

    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllExams);
    });
</script>
