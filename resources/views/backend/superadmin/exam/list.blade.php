@php
    $exams = App\Exam::where('school_id', school_id())->where('session', get_settings('running_session'))->get();
@endphp
@if (count($exams) > 0)
<button type="button" class="btn btn-icon btn-success mb-1" style="float: right;" onclick="showAjaxModal('{{ route('exam.create') }}', 'Create New Exam')"> <i class="mdi mdi-plus"></i> Add Exam</button>
<div class="table-responsive-sm">
    <table class="table table-striped table-centered mb-0">
            <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Option</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($exams as $exam)
                <tr>
                    <td>{{ $exam->name }}</td>
                    <td>
                        {{ date('D, d-M-Y', $exam->date) }}
                    </td>
                    <td>
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('exam.edit', $exam->id) }}', 'Update Exam')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Exam info"> <i class="mdi mdi-wrench"></i> </button>
                            <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('exam.destroy', $exam->id) }}', 'exam_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Exam"> <i class="mdi mdi-window-close"></i> </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
</div>
@else
    <div style="text-align: center;">
        <img src="{{ asset('backend/images/empty_box.png') }}" alt="" height="150" width="200" style="text-align: center;  opacity: 0.8;">
        <p>Oops No Data Found...<a href="#" onclick="showAjaxModal('{{ route('exam.create') }}', 'Create New Exam')" style="color: #757575; font-weight: 800;">Click here.</a></p>
    </div>
@endif

