<table class="table table-hover table-centered mb-0">
    <thead>
    <tr>
        <th>Name</th>
        <th>Status</th>
        <th>Option</th>
    </tr>
    </thead>
    <tbody>
    @foreach (App\Session::where('school_id', 1)->get() as $session)
        <tr>
            <td>{{ $session->name }}</td>
            <td>
                @if ($session->status == 0)
                    <i class="mdi mdi-circle text-disable"></i> Disabled
                @else
                    <i class="mdi mdi-circle text-success"></i> Enabled
                @endif
            </td>
            <td>
                <button type="button" class="btn btn-icon btn-warning" onclick="showAjaxModal('{{ route('session_manager.edit', $session->id) }}')"> <i class="mdi mdi-wrench"></i> </button>
                <button type="button" class="btn btn-icon btn-danger" onclick="confirm_modal('{{ route('session_manager.destroy', $session->id) }}', 'session_content' )"> <i class="mdi mdi-window-close"></i> </button>
            </td>
        </tr>
    @endforeach
    @if (sizeof(App\Session::where('school_id', 1)->get()) == 0)
        <tr>
            <td colspan="3"> No Data Found</td>
        </tr>
    @endif
    </tbody>
</table>