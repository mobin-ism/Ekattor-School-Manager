<form method="POST" class="d-block ajaxForm" action="{{ route('syllabus.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label for="title" class="col-md-3 col-form-label">Title</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="title" name = "title" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="class_id" class="col-md-3 col-form-label">Class</label>
            <div class="col-md-9">
                <select name="class_id" id="class_id" class="form-control" required onchange="classWiseSection(this.value)">
                    <option value="">Class</option>
                    @foreach (App\Classes::where('school_id', school_id())->get() as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="class" class="col-md-3 col-form-label">Section</label>
            <div class="col-md-9">
                <select name="section_id" id = "section_content_2" class="form-control" required>
                    <option value="">Select Class First</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="class" class="col-md-3 col-form-label">Subject</label>
            <div class="col-md-9">
                <select name="subject_id" id = "subject_content" class="form-control" required>
                    <option value="">Select Class First</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="class" class="col-md-3 col-form-label">Upload Syllabus</label>
            <div class="col-md-9">
                <input type="file" name="syllabus" id="syllabus" class="form-control-file">
            </div>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Upload Syllabus</button>
        </div>
    </form>

    <script>
        $(".ajaxForm").validate({}); // Jquery form validation initialization
        $(".ajaxForm").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, classAndSectionWiseSyllabus);
        });
    </script>

    <script>
        function classWiseSection(class_id) {
            var url = '{{ route("section.show", "class_id") }}';
            url = url.replace('class_id', class_id);

            $.ajax({
                type : 'GET',
                url: url,
                success : function(response) {
                    $('#section_content_2').html(response);
                    var url = '{{ route("routine.subject", "class_id") }}';
                    url = url.replace('class_id', class_id);

                    $.ajax({
                        type : 'GET',
                        url: url,
                        success : function(response) {
                            $('#subject_content').html(response);
                        }
                    });

                }
            });
        }
    </script>
