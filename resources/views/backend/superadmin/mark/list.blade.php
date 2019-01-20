@if (isset($students))
    @if (count($students) > 0)
        <div class="table-responsive-sm">
            <table class="table table-bordered table-sm " width="100%">
                <thead class="thead-dark">
                <tr>
                    <th>Student Name</th>
                    <th>Mark</th>
                    <th>Comment</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $marks = \App\Mark::where('subject_id', $subject_id)->where('class_id', $class_id)->where('section_id', $section_id)->where('exam_id', $exam_id)->where('session', $running_session)->where('school_id', $school_id)->get();
                    @endphp
                    @foreach ($marks as $mark)
                        <tr>
                            <td>{{ $mark->student->user->name }}</td>
                            <td>
                                <input type="text" class="form-control" name="mark_{{ $mark->id }}" id="mark_{{ $mark->id }}" value="{{ $mark->mark_obtained }}">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="comment_{{ $mark->id }}" id="comment_{{ $mark->id }}" value="{{ $mark->comment }}">
                            </td>
                            <td style="text-align: center;">
                                <button type="button" class="btn btn-icon btn-success" onclick="saveMark('{{ $mark->id }}')"> <i class="mdi mdi-check-circle"></i> </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div style="text-align: center;">
            <img src="{{ asset('backend/images/empty_box.png') }}" alt="" height="150" width="200" style="text-align: center;  opacity: 0.8;">
            <p>Oops No Data Found...</p>
        </div>
    @endif
@else
<div style="text-align: center;">
    <img src="{{ asset('backend/images/empty_box.png') }}" alt="" height="150" width="200" style="text-align: center;  opacity: 0.8;">
    <p>Oops No Data Found...</p>
</div>
@endif
