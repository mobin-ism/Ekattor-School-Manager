<form method="POST" class="d-block ajaxForm" action="{{ route('section.update', $classes->id) }}">
    @csrf
    @method('PATCH')

    <div id = "section_area">
        @foreach ($classes->sections as $key => $section)
        <div class="form-row">
            <div class="form-group col-md-12">
                <input type="hidden" class="form-control" name = "section_id[]" value="{{ $section->id }}">
                <input type="text" class="form-control" id="name" name = "name[]" value="{{ $section->name }}">
            </div>
            <div class="form-group col-md-12">
                <button class="btn btn-block btn-danger" type="button" onclick="deleteSection('{{ route('section.destroy', $section->id) }}', this)">Delete Section {{ $section->name }}</button>
            </div>
        </div>
        @endforeach
    </div>

    <div id = "blank_section">
        <div class="form-row">
            <div class="form-group col-md-12">
                <input type="hidden" class="form-control" name = "section_id[]" value="">
                <input type="text" class="form-control" name = "name[]" value="">
            </div>
            <div class="form-group col-md-12">
                <button class="btn btn-block btn-danger" type="button" onclick="removeSection(this)">Delete This Section</button>
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

    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, 'class_content');
    });
</script>

