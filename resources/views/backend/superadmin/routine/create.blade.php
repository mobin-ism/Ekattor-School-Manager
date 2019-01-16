<form method="POST" class="d-block ajaxForm" action="{{ route('routine.store') }}">
        @csrf
        <div class="form-group row">
            <label for="class_id" class="col-md-3 col-form-label">Class</label>
            <div class="col-md-9">
                <select name="class_id" id="class_id" class="form-control" required onchange="classWiseSection(this.value)">
                    <option value="">Class</option>
                    @foreach (App\Classes::where('school_id', 1)->get() as $class)
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
            <label for="teacher_id" class="col-md-3 col-form-label">Teacher</label>
            <div class="col-md-9">
                <select name="teacher_id" id = "teacher_id" class="form-control" required>
                    <option value="">Assign A Teacher</option>
                    @foreach (App\Teacher::where(['school_id' => school_id()])->get() as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="class_room_id" class="col-md-3 col-form-label">Class Room</label>
            <div class="col-md-9">
                <select name="class_room_id" id = "class_room_id" class="form-control" required>
                    <option value="">Select A Class Room</option>
                    @foreach (App\ClassRoom::where(['school_id' => school_id()])->get() as $room)
                        <option value="{{ $room->id }}">{{ $room->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="day" class="col-md-3 col-form-label">Day</label>
            <div class="col-md-9">
                <select name="day" id = "day" class="form-control" required>
                    <option value="">Select A Day</option>
                    <option value="saturday">Saturday</option>
                    <option value="sunday">Sunday</option>
                    <option value="monday">Monday</option>
                    <option value="tuesday">Tuesday</option>
                    <option value="wednesday">Wednesday</option>
                    <option value="thursday">Thursday</option>
                    <option value="friday">Friday</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="starting_hour" class="col-md-3 col-form-label">Starting Hour</label>
            <div class="col-md-9">
                <select name="starting_hour" id = "starting_hour" class="form-control" required>
                    <option value="">Starting Hour</option>
                    @for($i = 0; $i <= 23; $i++)
                        @if ($i < 12)
                            @if ($i == 0)
                                <option value="{{ $i }}">{{ '12 AM' }}</option>
                            @else
                                <option value="{{ $i }}">{{ $i.' AM' }}</option>
                            @endif
                        @else
                            @php
                                $j = $i - 12;
                            @endphp
                            @if ($j == 0)
                                <option value="{{ $j }}">{{ '12 PM' }}</option>
                            @else
                                <option value="{{ $i }}">{{ $j.' PM' }}</option>
                            @endif
                        @endif
                    @endfor
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="starting_minute" class="col-md-3 col-form-label">Starting Minute</label>
            <div class="col-md-9">
                <select name="starting_minute" id = "starting_minute" class="form-control" required>
                    <option value="">Starting Minute</option>
                    @for($i = 0; $i <= 55; $i = $i+5)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="ending_hour" class="col-md-3 col-form-label">Ending Hour</label>
            <div class="col-md-9">
                <select name="ending_hour" id = "ending_hour" class="form-control" required>
                    <option value="">Ending Hour</option>
                    @for($i = 0; $i <= 23; $i++)
                        @if ($i < 12)
                            @if ($i == 0)
                                <option value="{{ $i }}">{{ '12 AM' }}</option>
                            @else
                                <option value="{{ $i }}">{{ $i.' AM' }}</option>
                            @endif
                        @else
                            @php
                                $j = $i - 12;
                            @endphp
                            @if ($j == 0)
                                <option value="{{ $j }}">{{ '12 PM' }}</option>
                            @else
                                <option value="{{ $i }}">{{ $j.' PM' }}</option>
                            @endif
                        @endif
                    @endfor
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="ending_minute" class="col-md-3 col-form-label">Ending Minute</label>
            <div class="col-md-9">
                <select name="ending_minute" id = "ending_minute" class="form-control" required>
                    <option value="">Ending Minute</option>
                    @for($i = 0; $i <= 55; $i = $i+5)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Add Class Routine</button>
        </div>
    </form>

    <script>
        $(".ajaxForm").validate({}); // Jquery form validation initialization
        $(".ajaxForm").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, getClassRoutine);
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
