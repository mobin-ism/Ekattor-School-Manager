@if (isset($students) && count($students) > 0)
    <div class="table-responsive-sm">
        <table class="table table-striped table-centered mb-0">
            <thead class="thead-dark">
                    <tr>
                        <th>Code</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Option</th>
                    </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                            <td>{{ $student->student->code }}</td>
                        <td></td>
                        <td>{{ $student->student->user->name }}</td>
                        <td>
                            <div class="btn-group mb-2">

                                <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showLargeAjaxModal('{{ route('student.profile', $student->student->id) }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Student Profile"> <i class="dripicons-checklist"></i> </button>

                                <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('teacher.edit', $student->id) }}', 'Update Teacher')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Student"> <i class="mdi mdi-wrench"></i> </button>

                                <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('teacher.destroy', $student->id) }}', 'teacher_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Student"> <i class="mdi mdi-window-close"></i> </button>
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
        <p>No student found on this class and section.</p>
    </div>
@endif




