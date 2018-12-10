<table class="table table-striped table-centered mb-0">
    <thead class="thead-dark">
    <tr>
        <th>Name</th>
        <th>Date</th>
        <th>Option</th>
    </tr>
    </thead>
    <tbody>
    @foreach (App\Exam::where('school_id', school_id())->where('session', get_settings('running_session'))->get() as $exam)
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
    @if (sizeof(App\Exam::where('school_id', school_id())->where('session', get_settings('running_session'))->get()) == 0)
        <tr>
            <td colspan="3"> No Data Found</td>
        </tr>
    @endif
    </tbody>
</table>
