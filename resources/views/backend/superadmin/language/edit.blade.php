<form method="POST" class="d-block ajaxForm" action="{{ route('language.update', $language->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="name">Language Name</label>
                <input type="text" class="form-control" id="name" name = "name" value="{{ $language->name }}" required>
                <small id="department_name_help" class="form-text text-muted">Provide Language Name.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="name">Language Code</label>
                <input type="text" class="form-control" id="code" name = "code" value="{{ $language->code }}" required>
                <small id="department_name_help" class="form-text text-muted">Provide Language Code.</small>
            </div>
    
            <div class="form-group  col-md-12">
                <button class="btn btn-block btn-primary" type="submit">Update Language</button>
            </div>
        </div>
    </form>
    
    <script>
        $(".ajaxForm").validate({});
        $(".ajaxForm").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, showAllLanguages);
        });
    </script>
    