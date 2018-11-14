<table class="table table-hover table-centered mb-0">
    <thead>
    <tr>
        <th>Name</th>
        <th>Section</th>
        <th>Option</th>
    </tr>
    </thead>
    <tbody>
    @foreach (App\Classes::where('school_id', 1)->get() as $class)
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
                    <button type="button" class="btn btn-icon btn-info" style="margin-right:5px;" onclick="showAjaxModal('{{ route('class.show', $class->id) }}')"> <i class="dripicons-checklist"></i> </button>
                    <button type="button" class="btn btn-icon btn-warning" style="margin-right:5px;" onclick="showAjaxModal('{{ route('class.edit', $class->id) }}')"> <i class="mdi mdi-wrench"></i> </button>
                    <button type="button" class="btn btn-icon btn-danger" style="margin-right:5px;" onclick="confirm_modal('{{ route('class.destroy', $class->id) }}', 'class_content' )"> <i class="mdi mdi-window-close"></i> </button>
                </div>
            </td>
        </tr>
    @endforeach
    @if (sizeof(App\Classes::where('school_id', 1)->get()) == 0)
        <tr>
            <td colspan="3"> No Data Found</td>
        </tr>
    @endif
    </tbody>
</table>
