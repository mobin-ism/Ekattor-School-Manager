<form method="POST" class="d-block ajaxForm" action="{{ route('room.update', $room->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="name">Class Room Name</label>
                <input type="text" class="form-control" id="name" name = "name" value="{{ $room->name }}" required>
                <small id="name_help" class="form-text text-muted">Provide A Class Room Name.</small>
            </div>

            <div class="form-group  col-md-12">
                <button class="btn btn-block btn-primary" type="submit">Update Class Room</button>
            </div>
        </div>
    </form>

    <script>
        $(".ajaxForm").validate({});
        $(".ajaxForm").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, showAllClassRooms);
        });
    </script>
