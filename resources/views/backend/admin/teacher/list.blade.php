<table class="table table-hover table-centered mb-0">
<thead>
    <tr>
        <th>Name</th>
        <th>Department</th>
        <th>Designation</th>
        <th>Option</th>
    </tr>
</thead>
    <tbody>
    @php
    if(isset($department_id) && $department_id > 0){
        $teachers = \App\Teacher::where('school_id', 1)->where('department_id', $department_id)->paginate(10);
    }else {
        $teachers = \App\Teacher::where('school_id', 1)->paginate(10);
    }

    @endphp
        @foreach ( $teachers as $teacher)
            <tr>
                <td> {{ $teacher->user->name }} </td>
                <td> {{ $teacher->department->name }} </td>
                <td> {{ $teacher->designation }} </td>
                <td>
                    <div class="btn-group mb-2">
                        <button type="button" class="btn btn-icon btn-info" style="margin-right:5px;" onclick="showAjaxModal('{{ route('teacher.permission', $teacher->id) }}')"> <i class="dripicons-checklist"></i> </button>
                        <button type="button" class="btn btn-icon btn-warning" style="margin-right:5px;" onclick="showAjaxModal('{{ route('teacher.edit', $teacher->id) }}')"> <i class="mdi mdi-wrench"></i> </button>
                        <button type="button" class="btn btn-icon btn-danger" style="margin-right:5px;" onclick="confirm_modal('{{ route('teacher.destroy', $teacher->id) }}', 'teacher_content' )"> <i class="mdi mdi-window-close"></i> </button>
                    </div>
                </td>
            </tr>
        @endforeach
        @if (count($teachers) == 0)
            <tr>
                <td colspan="4">No Data Found</td>
            </tr>
        @endif
    </tbody>
</table>

{{-- <div class="row justify-content-md-center"> --}}
<div class="row">
    {{-- <div class="col-auto"> --}}
    <div class="col">
            {{ $teachers->links() }}
    </div>
</div>

