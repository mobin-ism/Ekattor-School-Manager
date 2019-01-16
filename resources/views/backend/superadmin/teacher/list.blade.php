@php
    if(isset($department_id) && $department_id > 0){
        $teachers = \App\Teacher::where('school_id', 1)->where('department_id', $department_id)->paginate(10);
    }else {
        $teachers = \App\Teacher::where('school_id', get_settings('selected_branch'))->paginate(10);
    }
@endphp
@if (count($teachers) > 0)
<div class="table-responsive-sm">
    <table class="table table-striped table-centered mb-0 colorfulTable">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $teachers as $teacher)
                <tr>
                    <td> {{ $teacher->user->name }} </td>
                    <td> {{ $teacher->department->name }} </td>
                    <td> {{ $teacher->designation }} </td>
                    <td>
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('teacher.permission', $teacher->id) }}', 'Assigned Permissions')"
                                data-toggle="tooltip" data-placement="top" title="" data-original-title="Assign permission for teachers"> <i class="dripicons-checklist"></i> </button>
                            <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('teacher.edit', $teacher->id) }}', 'Update Teacher')"
                                data-toggle="tooltip" data-placement="top" title="" data-original-title="Update teacher"> <i class="mdi mdi-wrench"></i> </button>
                            <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('teacher.destroy', $teacher->id) }}', departmentWiseFilter )"
                                data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Teacher"> <i class="mdi mdi-window-close"></i> </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p style="margin-top: 20px;"><small>Total {{ count($teachers) }} entries found. </small></p>

    <div class="row" style="float:right; margin-top: 10px;">
        <div class="col">
            {{ $teachers->links() }}
        </div>
    </div>
</div>
@else
    <div style="text-align: center;">
        <img src="{{ asset('backend/images/empty_box.png') }}" alt="" height="150" width="200" style="text-align: center;  opacity: 0.8;">
        <p>No Data Found. <a href="#" class="btn btn-light" onclick="showAjaxModal('{{ route('teacher.create') }}', 'Create New Teacher')" style="color: #757575; font-weight: 800;">Click here.</a></p>
    </div>
@endif
