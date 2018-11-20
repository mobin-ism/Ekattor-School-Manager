
<table class="table table-hover table-centered mb-0">
        <thead>
            <tr>
                <th>Code</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Option</th>
            </tr>
        </thead>
            <tbody>
                @if (isset($students))
                    @foreach ($students as $student)
                        <tr>
                                <td>{{ $student->student->code }}</td>
                            <td></td>
                            <td>{{ $student->student->user->name }}</td>
                            <td>
                                <div class="btn-group mb-2">
                                    <button type="button" class="btn btn-icon btn-info" style="margin-right:5px;" onclick="showLargeAjaxModal('{{ route('student.profile', $student->student->id) }}')"> <i class="dripicons-checklist"></i> </button>
                                    <button type="button" class="btn btn-icon btn-warning" style="margin-right:5px;" onclick="showAjaxModal('{{ route('teacher.edit', $student->id) }}')"> <i class="mdi mdi-wrench"></i> </button>
                                    <button type="button" class="btn btn-icon btn-danger" style="margin-right:5px;" onclick="confirm_modal('{{ route('teacher.destroy', $student->id) }}', 'teacher_content' )"> <i class="mdi mdi-window-close"></i> </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @if (count($students) == 0)
                        <tr>
                            <td colspan="4">No data found</td>
                        </tr>
                    @endif
                @else
                <tr>
                        <td colspan="4">No data found</td>
                    </tr>
                @endif
            </tbody>
        </table>


