<table class="table table-striped table-centered mb-0">
    <thead class="thead-dark">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone number</th>
        <th>Passing Session</th>
        <th>Option</th>
    </tr>
    </thead>
    <tbody>
    @foreach (App\Alumni::where('school_id', get_settings('selected_branch'))->get() as $alumnus)
        <tr>
            <td>{{ $alumnus->name }}</td>
            <td>{{ $alumnus->email }}</td>
            <td>{{ $alumnus->phone }}</td>
            <td>{{ $alumnus->session }}</td>
            <td>
                <div class="btn-group mb-2">
                    <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('alumni.edit', $alumnus->id) }}', 'Update Alumnus')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Alumnus info"> <i class="mdi mdi-wrench"></i> </button>
                    <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('alumni.destroy', $alumnus->id) }}', 'alumni_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Alumnus"> <i class="mdi mdi-window-close"></i> </button>
                </div>
            </td>
        </tr>
    @endforeach
    @if (sizeof(App\Alumni::where('school_id', get_settings('selected_branch'))->get()) == 0)
        <tr>
            <td colspan="5"> No Data Found</td>
        </tr>
    @endif
    </tbody>
</table>
