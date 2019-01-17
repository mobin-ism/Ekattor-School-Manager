<form method="POST" class="d-block ajaxForm" action="{{ route('book.store') }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="name">Book Name</label>
            <input type="text" class="form-control" id="name" name = "name" required>
            <small id="name_help" class="form-text text-muted">Provide A Book Name.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="author">Author</label>
            <input type="text" class="form-control" id="author" name = "author" required>
            <small id="author_help" class="form-text text-muted">Provide Author Name.</small>
        </div>

        <div class="form-group col-md-12">
            <label for="copies">Number Of Copy</label>
            <input type="number" class="form-control" id="copies" name = "copies" min="0" required>
            <small id="copies_help" class="form-text text-muted">Provide Total Number Of Books Copy.</small>
        </div>

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Save Book Info</button>
        </div>
    </div>
</form>

<script>
    $(".ajaxForm").validate({});
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllBooks);
    });
</script>
