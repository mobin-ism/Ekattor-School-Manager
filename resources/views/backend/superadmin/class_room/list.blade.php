@php
    $rooms = App\ClassRoom::where('school_id', school_id())->get();
@endphp
@if(count($rooms) > 0)
    <div class="table-responsive-sm">
        <table class="table table-striped table-centered mb-0">
            <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Option</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->name }}</td>
                    <td>
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('room.edit', $room->id) }}', 'Update Class Room')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Class Room's info"> <i class="mdi mdi-wrench"></i> </button>
                            <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('room.destroy', $room->id) }}', showAllClassRooms )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Class Room"> <i class="mdi mdi-window-close"></i> </button>
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
        <p>Oops No Data Found...<a href="#" onclick="showAjaxModal('{{ route('room.create') }}', 'Create New Class Room')" style="color: #757575; font-weight: 800;">Click here.</a></p>
    </div>
@endif
