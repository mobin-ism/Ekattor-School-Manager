
@if (isset($month) && isset($year))
    @php
        $number_of_days = cal_days_in_month(CAL_GREGORIAN, date('m', strtotime($month)), $year);
        $class_name = App\Classes::find($class_id)->pluck('name')->first();
        $section_name = App\Section::find($section_id)->pluck('name')->first();
    @endphp

    <div class="row justify-content-md-center">
        <div class="col-md-4">
            <div class="card text-white bg-secondary">
                <div class="card-body">
                    <div class="toll-free-box text-center">
                        <h4> <i class="mdi mdi-chart-bar"></i>Attendance Report</h4>
                        <h5>Class: {{ $class_name }}</h5>
                        <h5>Section: {{ $section_name }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-striped table-centered table-bordered mb-0 table-responsive">
        <thead class="thead-dark">
            <tr>
                <th width = "40px">Student <i class="mdi mdi-arrow-down"></i> Date <i class="mdi mdi-arrow-right"></i></th>
                @for ($i = 1; $i <= $number_of_days; $i++)
                    <th>{{$i}}</th>
                @endfor
            </tr>
        </thead>
        <tbody>
            @if (isset($students))
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->student->user->name }}</td>
                        @for ($i = 1; $i <= $number_of_days; $i++)
                            @if (App\DailyAttendance::where('school_id', school_id())->where('class_id', $class_id)->where('section_id', $section_id)->where('student_id', $student->student_id)->where('timestamp', strtotime($i.'-'.$month.'-'.$year))->pluck('status')->first())
                                <td><i class="fas fa-circle" style="color: green;"></i></td>
                            @else
                                <td><i class="fas fa-circle" style="color: red;"></i></td>
                            @endif
                        @endfor
                    </tr>
                @endforeach
                @if (count($students) == 0)
                    <tr>
                        <td colspan="{{ $number_of_days+1 }}">No data found</td>
                    </tr>
                @endif
            @else
            <tr>
                <td colspan="{{ $number_of_days+1 }}">No data found</td>
            </tr>
            @endif
        </tbody>
    </table>
@else
    <div style="text-align: center;">
        <img src="{{ asset('backend/images/empty_box.png') }}" alt="" height="150" width="200" style="text-align: center;  opacity: 0.8;">
        <p>Oops No Data Found... <a href="#" style="color: #757575; font-weight: 800;" onclick="showAjaxModal('{{ route('daily_attendance.create') }}', 'Take Attendance')">Take Attendance</a> </p>
    </div>
@endif


