@php
    if(isset($department_id) && $department_id > 0){
        $teachers = \App\Teacher::where('school_id', school_id())->where('department_id', $department_id)->get();
    }else {
        $teachers = \App\Teacher::where('school_id', school_id())->get();
    }
@endphp
@if (count($teachers) > 0)
<div class="table-responsive-sm">
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
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
</div>
@else
    <div style="text-align: center;">
        <img src="{{ asset('backend/images/empty_box.png') }}" alt="" height="150" width="200" style="text-align: center;  opacity: 0.8;">
        <p>No Data Found. <a href="#" class="btn btn-light" onclick="showAjaxModal('{{ route('teacher.create') }}', 'Create New Teacher')" style="color: #757575; font-weight: 800;">Click here.</a></p>
    </div>
@endif
