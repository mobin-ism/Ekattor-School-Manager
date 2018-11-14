<form method="POST" class="d-block ajaxForm" action="{{ route('section.update', $classes->id) }}">
    @csrf
    @method('PATCH')

    {{-- <div class="form-row">
        <div class="form-group col-md-12">
            <label for="name">Class name</label>
            <input type="text" class="form-control" id="name" name = "name">
            <small id="name_help" class="form-text text-muted">Provide Class Name.</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Create Class</button>
        </div>
    </div> --}}

    <div style="width: 100%;" id = "section_area">
        @foreach ($classes->sections as $key => $section)
            <div class="form-row" style="width: 100%;">
                <div class="form-group col-md-10">
                    <input type="hidden" name = "section_ids[]" value="{{ $section->id }}">
                    <input type="text" class="form-control" name = "name[]" value="{{ $section->name }}">
                </div>
                <div class="form-group col-md-2">
                    <a href="javascript: void(0);" class="btn btn-icon btn-danger" style="color: white;" onclick="deleteSection('{{ route('section.destroy', $section->id) }}', this)"><i class="mdi mdi-window-close"></i></a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="w-100"  id = "blank_section">
        <div class="form-row w-100">
                <div class="form-group col-md-10">
                    <input type="hidden" name = "section_ids[]" value="">
                    <input type="text" class="form-control" name = "name[]" value="">
                </div>
                <div class="form-group col-md-2 pull-right">
                    <a href="javascript: void(0);" class="btn btn-sm btn-icon btn-success" style="color: white;" onclick="removeSection(this)"><i class="mdi mdi-window-close"></i></a>
                </div>
            </div>
    </div>

    <div class="row no-gutters">
        <div class="form-group  col-md-12 p-0">
            <button class="btn btn-block btn-success" type="button" onclick="appendSection()">Add Section</button>
        </div>
        <div class="form-group  col-md-12 p-0">
            <button class="btn btn-block btn-primary" type="submit">Update</button>
        </div>
    </div>
</form>

<script>

    var blank_section_field = $('#blank_section').html();

    $(document).ready(function() {
        $('#blank_section').hide();
    });

    function deleteSection(deleteUrl, elem) {
        $.ajax({
            type : 'GET',
            url  : deleteUrl,
            success : function(response) {
                $(elem).parent().parent().remove();
                toastr.success('Section Deleted');
                $('#class_content').html(response);
            }
        });

    }

    function appendSection() {
        $('#section_area').append(blank_section_field);
    }

    function removeSection(elem) {
        $(elem).closest('.form-row').remove();
    }
</script>

