
@if (isset($students) && count($students) > 0)

<div class="table-responsive-sm">
        <table class="table table-striped table-centered mb-0 colorfulTable">
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
                        <td><img src="{{ asset('backend/images/student_image/'.$student->id.'.jpg') }}" height="50" width="50" alt=""></td>
                        <td>{{ $student->student->user->name }}</td>
                        <td>
                            <div class="btn-group mb-2">

                                <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showLargeAjaxModal('{{ route('student.profile', $student->student->id) }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Student Profile"> <i class="dripicons-checklist"></i> </button>

                                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Student"> <i class="mdi mdi-wrench"></i> </a>

                                <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('student.destroy', $student->id) }}', classAndSectionWiseStudents )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Student"> <i class="mdi mdi-window-close"></i> </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p style="margin-top: 20px;"><small>Total {{ count($students) }} entries found. </small></p>
    </div>
@else
    <div style="text-align: center;">
        <img src="{{ asset('backend/images/empty_box.png') }}" alt="" height="150" width="200" style="text-align: center;  opacity: 0.8;">
        <p>No student found on this class and section.</p>
    </div>
@endif




