@php
    $departments = App\Department::where('school_id', 1)->get();
@endphp
@if (count($departments) > 0)
<div class="table-responsive-sm">
        <table class="table table-striped table-centered mb-0">
                <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($departments as $department)
                    <tr>
                        <td>{{ $department->name }}</td>
                        <td>
                            <div class="btn-group mb-2">
                                <button type="button" class="btn btn-icon btn-secondary" style="margin-right:5px;" onclick="showAjaxModal('{{ route('department.edit', $department->id) }}', 'Update Department')"> <i class="mdi mdi-wrench"></i> </button>
                                <button type="button" class="btn btn-icon btn-dark" style="margin-right:5px;" onclick="confirm_modal('{{ route('department.destroy', $department->id) }}', 'department_content' )"> <i class="mdi mdi-window-close"></i> </button>
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
        <p>Oops No Data Found...<a href="#" onclick="showAjaxModal('{{ route('department.create') }}', 'Create Department')" style="color: #757575; font-weight: 800;">Click here.</a></p>
    </div>
@endif


