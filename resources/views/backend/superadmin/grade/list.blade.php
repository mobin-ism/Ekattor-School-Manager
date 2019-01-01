@php
    $grades = App\Grade::where(['school_id' => school_id(), 'session' => get_settings('running_session')])->get();
@endphp
@if (count($grades) > 0)
    <button type="button" class="btn btn-icon btn-success mb-1" style="float: right;" onclick="showAjaxModal('{{ route('grade.create') }}', 'Create New Grade')"> <i class="mdi mdi-plus"></i> Add Grade</button>
    <div class="table-responsive-sm">
        <table class="table table-striped table-centered mb-0">
            <thead class="thead-dark">
            <tr>
                <th>Grade Name</th>
                <th>Grade Point</th>
                <th>Mark From</th>
                <th>Mark Upto</th>
                <th>Comment</th>
                <th>Option</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($grades as $grade)
                <tr>
                    <td>{{ $grade->name }}</td>
                    <td>{{ $grade->grade_point }}</td>
                    <td>{{ $grade->mark_from }}</td>
                    <td>{{ $grade->mark_upto }}</td>
                    <td>{{ $grade->comment }}</td>
                    <td>
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('grade.edit', $grade->id) }}', 'Update Grade')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Grade info"> <i class="mdi mdi-wrench"></i> </button>
                            <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('grade.destroy', $grade->id) }}', 'grade_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Grade"> <i class="mdi mdi-window-close"></i> </button>
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
        <p>Oops No Data Found...<a href="#" onclick="showAjaxModal('{{ route('grade.create') }}', 'Create New Grade')" style="color: #757575; font-weight: 800;">Click here.</a></p>
    </div>
@endif


