<form method="POST" class="d-block ajaxForm" action="{{ route('daily_attendance.store') }}">
    @csrf

    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" for="date">Date</label>
        <div class="col-md-9">
            <input type="text" class="form-control date" id="date" data-toggle="date-picker" data-single-date-picker="true" name = "date" value="" required>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" for="class_id"> Class</label>
        <div class="col-md-9">
            <select name="class_id" id="class_id" class="form-control" onchange="classWiseSection(this.value)" required>
                <option value="">Class</option>
                @foreach (App\Classes::where('school_id', 1)->get() as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" for="section_id"> Section</label>
        <div class="col-md-9" id = "section_content_2">
            <select name="section_id" id="section_id" class="form-control" required >
                <option value="">Select A Class First</option>
            </select>
        </div>
    </div>


    <div class="row mb-3" id = "student_content" style="margin-left: 2px;">
        @include('backend.'.Auth::user()->role.'.daily_attendance.students')
    </div>


    <div class="form-group  col-md-12">
        <button class="btn btn-block btn-primary" type="submit">Update Attendance</button>
    </div>
</form>

<script>
    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, 'daily_attendance_content');
    });
</script>

<script>
    $(document).ready(function() {
        $('#date').daterangepicker();
    });
    function classWiseSection(class_id) {

        var url = '{{ route("section.show", "class_id") }}';
        url = url.replace('class_id', class_id);

        $.ajax({
            type : 'GET',
            url: url,
            success : function(response) {
                $('#section_content_2').html(response);
            }
        });
    }

    function onChangeSection(section_id) {
        if(section_id > 0) {
        var url = '{{ route("daily_attendance.students") }}';
        var date = $('#date').val();
        $.ajax({
            type : 'POST',
            url: url,
            data : { section_id : section_id, date : date, _token : '{{ @csrf_token() }}' },
            success : function(response) {
                $('#student_content').html(response);
            }
        });
        }
    }
</script>
