<table class="table table-striped table-centered mb-0">
    <thead class="thead-dark">
    <tr>
        <th>Name</th>
        <th>Status</th>
        <th>Option</th>
    </tr>
    </thead>
    <tbody>
    @php
        $schools = App\School::paginate(10);
    @endphp
    @foreach ($schools as $school)
        <tr>
            <td>{{ $school->name }}</td>
            <td>
                @if ($school->id == get_settings('selected_branch'))
                    <i class="mdi mdi-circle text-success"></i> Active
                @else
                    <i class="mdi mdi-circle text-disable"></i> Deactive
                @endif
            </td>
            <td>
                <div class="btn-group mb-2">
                    <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('school.edit', $school->id) }}', 'Update School')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update school info"> <i class="mdi mdi-wrench"></i> </button>
                    <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('school.switch', $school->id) }}', 'school_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Switch School"> <i class="mdi mdi-checkbox-marked-circle"></i> </button>
                    <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('school.destroy', $school->id) }}', 'school_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete school"> <i class="mdi mdi-window-close"></i> </button>
                </div>
            </td>
        </tr>
    @endforeach
    @if (sizeof(App\School::get()) == 0)
        <tr>
            <td colspan="3"> No Data Found</td>
        </tr>
    @endif
    </tbody>
</table>

<div class="row" style="float:right; margin-top: 10px;">
    <div class="col">
        {{ $schools->links() }}
    </div>
</div>
