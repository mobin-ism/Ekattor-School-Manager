@php
    $classes = App\Classes::where('school_id', 1)->get();
@endphp
@if (count($classes) > 0)
    <div class="table-responsive-sm">
        <table class="table table-striped table-centered mb-0 colorfulTable">
            <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Section</th>
                <th>Option</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($classes as $class)
                <tr>
                    <td>{{ $class->name }}</td>
                    <td>
                        <ul>
                            @foreach ($class->sections as $section)
                            <li>{{ $section->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('class.show', $class->id) }}', 'Sections')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Sections"> <i class="dripicons-checklist"></i> </button>
                            <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('class.edit', $class->id) }}', 'Update Class')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Class info"> <i class="mdi mdi-wrench"></i> </button>
                            <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('class.destroy', $class->id) }}', showAllClasses )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Class"> <i class="mdi mdi-window-close"></i> </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <p style="margin-top: 20px;"><small>Total {{ count($classes) }} entries found. </small></p>
    </div>
@else
    <div style="text-align: center;">
        <img src="{{ asset('backend/images/empty_box.png') }}" alt="" height="150" width="200" style="text-align: center;  opacity: 0.8;">
        <p>Oops No Data Found...<a href="#" onclick="showAjaxModal('{{ route('class.create') }}', 'Create Class')" style="color: #757575; font-weight: 800;">Click here.</a></p>
    </div>
@endif

