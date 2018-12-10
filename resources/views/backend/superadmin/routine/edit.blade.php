@php
    $subjects = App\Subject::where('class_id', $routine->class_id)->get();
    $sections = App\Section::where('class_id', $routine->class_id)->get();
@endphp
<form method="POST" class="d-block ajaxForm" action="{{ route('routine.update', $routine->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group col-md-12">
            <label for="class">Class</label>
            <select name="class_id" id="class_id" class="form-control" required onchange="classWiseSection(this.value)">
                <option value="">Class</option>
                @foreach (App\Classes::where('school_id', 1)->get() as $class)
                    <option value="{{ $class->id }}" @if($class->id == $routine->class_id) selected @endif>{{ $class->name }}</option>
                @endforeach
            </select>
            <small id="class_help" class="form-text text-muted">Select Class.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="class">Section</label>
            <select class="form-control" name="section_id" id="section_content_2" required>
                @if (count($sections) == 0)
                    <option value="">Select A Class First</option>
                @else
                    <option value="">Select A Section</option>
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}" @if($section->id == $routine->section_id) selected @endif>{{ $section->name }}</option>
                    @endforeach
                @endif
            </select>
            <small id="section_help" class="form-text text-muted">Select Section.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="class">Subject</label>
            <select class="form-control" name="subject_id" id="subject_content" required>
                @if (count($subjects) == 0)
                    <option value="">No Subjects Found</option>
                @else
                    <option value="">Select A Subject</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}" @if($subject->id == $routine->subject_id) selected @endif>{{ $subject->name }}</option>
                    @endforeach
                @endif
            </select>

            <small id="subject_help" class="form-text text-muted">Select A Subject.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="teacher_id">Teacher</label>
            <select name="teacher_id" id = "teacher_id" class="form-control" required>
                <option value="">Assign A Teacher</option>
                @foreach (App\Teacher::where(['school_id' => school_id()])->get() as $teacher)
                    <option value="{{ $teacher->id }}" @if($teacher->id == $routine->teacher_id) selected @endif>{{ $teacher->user->name }}</option>
                @endforeach
            </select>
            <small id="teacher_help" class="form-text text-muted">Assign A Teacher.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="class_room_id">Class Room</label>
            <select name="class_room_id" id = "class_room_id" class="form-control" required>
                <option value="">Select A Class Room</option>
                @foreach (App\ClassRoom::where(['school_id' => school_id()])->get() as $room)
                    <option value="{{ $room->id }}" @if($room->id == $routine->room_id) selected @endif>{{ $room->name }}</option>
                @endforeach
            </select>
            <small id="class_room_help" class="form-text text-muted">Select A Class Room.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="day">Day</label>
            <select name="day" id = "day" class="form-control" required>
                <option value="">Select A Day</option>
                <option value="saturday" @if($routine->day == 'saturday') selected @endif>Saturday</option>
                <option value="sunday" @if($routine->day == 'sunday') selected @endif>Sunday</option>
                <option value="monday" @if($routine->day == 'monday') selected @endif>Monday</option>
                <option value="tuesday" @if($routine->day == 'tuesday') selected @endif>Tuesday</option>
                <option value="wednesday" @if($routine->day == 'wednesday') selected @endif>Wednesday</option>
                <option value="thursday" @if($routine->day == 'thursday') selected @endif>Thursday</option>
                <option value="friday" @if($routine->day == 'friday') selected @endif>Friday</option>
            </select>
            <small id="day_help" class="form-text text-muted">Select A Day.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="starting_hour">Starting Hour</label>
            <select name="starting_hour" id = "starting_hour" class="form-control" required>
                <option value="">Starting Hour</option>
                @for($i = 0; $i <= 23; $i++)
                    @if ($i < 12)
                        @if ($i == 0)
                            <option value="{{ $i }}" @if($routine->starting_hour == $i) selected @endif>{{ '12 AM' }}</option>
                        @else
                            <option value="{{ $i }}" @if($routine->starting_hour == $i) selected @endif>{{ $i.' AM' }}</option>
                        @endif
                    @else
                        @php
                            $j = $i - 12;
                        @endphp
                        @if ($j == 0)
                            <option value="{{ $j }}" @if($routine->starting_hour == $i) selected @endif>{{ '12 PM' }}</option>
                        @else
                            <option value="{{ $i }}" @if($routine->starting_hour == $i) selected @endif>{{ $j.' PM' }}</option>
                        @endif
                    @endif
                @endfor
            </select>
            <small id="starting_hour_help" class="form-text text-muted">Starting Hour.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="starting_minute">Starting Minute</label>
            <select name="starting_minute" id = "starting_minute" class="form-control" required>
                <option value="">Starting Minute</option>
                @for($i = 0; $i <= 55; $i = $i+5)
                    <option value="{{ $i }}" @if($routine->starting_minute == $i) selected @endif>{{ $i }}</option>
                @endfor
            </select>
            <small id="starting_minute_help" class="form-text text-muted">Starting Minute.</small>
        </div>

        <div class="form-group col-md-12">
                <label for="ending_hour">Ending Hour</label>
                <select name="ending_hour" id = "ending_hour" class="form-control" required>
                    <option value="">Ending Hour</option>
                    @for($i = 0; $i <= 23; $i++)
                        @if ($i < 12)
                            @if ($i == 0)
                                <option value="{{ $i }}" @if($routine->ending_hour == $i) selected @endif>{{ '12 AM' }}</option>
                            @else
                                <option value="{{ $i }}" @if($routine->ending_hour == $i) selected @endif>{{ $i.' AM' }}</option>
                            @endif
                        @else
                            @php
                                $j = $i - 12;
                            @endphp
                            @if ($j == 0)
                                <option value="{{ $j }}" @if($routine->ending_hour == $i) selected @endif>{{ '12 PM' }}</option>
                            @else
                                <option value="{{ $i }}" @if($routine->ending_hour == $i) selected @endif>{{ $j.' PM' }}</option>
                            @endif
                        @endif
                    @endfor
                </select>
                <small id="ending_hour_help" class="form-text text-muted">Ending Hour.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="ending_minute">Ending Minute</label>
                <select name="ending_minute" id = "ending_minute" class="form-control" required>
                    <option value="">Ending Minute</option>
                    @for($i = 0; $i <= 55; $i = $i+5)
                        <option value="{{ $i }}" @if($routine->ending_minute == $i) selected @endif>{{ $i }}</option>
                    @endfor
                </select>
                <small id="ending_minute_help" class="form-text text-muted">Ending Minute.</small>
            </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Update Class Routine</button>
        </div>
    </form>

    <script>
        $(".ajaxForm").validate({}); // Jquery form validation initialization
        $(".ajaxForm").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, 'routine_content');
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
