<table class="table table-striped table-centered mb-0">
    <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Option</th>
        </tr>
    </thead>
        <tbody>
        @php
        if(isset($class_id) && $class_id > 0){
            if ($class_id == 'all')
                $subjects = \App\Subject::where('school_id', school_id())->paginate(10);
            else
                $subjects = \App\Subject::where('school_id', school_id())->where('class_id', $class_id)->paginate(10);
        }else {
            $subjects = \App\Subject::where('school_id', school_id())->paginate(10);
        }
        @endphp
            @foreach ( $subjects as $subject)
                <tr>
                    <td> {{ $subject->name }} </td>
                    <td>
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('subject.edit', $subject->id) }}', 'Update subject')"
                                data-toggle="tooltip" data-placement="top" title="" data-original-title="Update subject"> <i class="mdi mdi-wrench"></i> </button>
                            <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('subject.destroy', $subject->id) }}', 'subject_content' )"
                                data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete subject"> <i class="mdi mdi-window-close"></i> </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            @if (count($subjects) == 0)
                <tr>
                    <td colspan="2">No Data Found</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="row" style="float:right; margin-top: 10px;">
        <div class="col">
            {{ $subjects->links() }}
        </div>
    </div>
