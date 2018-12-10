<table class="table table-striped table-centered mb-0">
        <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Option</th>
        </tr>
        </thead>
        <tbody>
        @foreach (App\ClassRoom::where('school_id', school_id())->get() as $room)
            <tr>
                <td>{{ $room->name }}</td>
                <td>
                    <div class="btn-group mb-2">
                        <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('room.edit', $room->id) }}', 'Update Class Room')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Class Room's info"> <i class="mdi mdi-wrench"></i> </button>
                        <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('room.destroy', $room->id) }}', 'room_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Class Room"> <i class="mdi mdi-window-close"></i> </button>
                    </div>
                </td>
            </tr>
        @endforeach
        @if (sizeof(App\ClassRoom::where('school_id', school_id())->get()) == 0)
            <tr>
                <td colspan="2"> No Data Found</td>
            </tr>
        @endif
        </tbody>
    </table>
