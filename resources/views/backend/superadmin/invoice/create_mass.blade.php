<form method="POST" class="d-block ajaxForm" action="{{ route('invoice.mass.store') }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="class">Class</label>
                <select name="class_id" id="class_id" class="form-control" onchange="classWiseSection(this.value)" required>
                    <option value="">Class</option>
                    @foreach (App\Classes::where('school_id', school_id())->get() as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
                <small id="class_help" class="form-text text-muted">Select Class.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="section_content_2">Section</label>
                <select name="section_id" id = "section_content_2" class="form-control" required>
                    <option value="">Select A Section</option>
                </select>
                <small id="student_help" class="form-text text-muted">Select Section.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="title">Invoice Title</label>
                <input type="text" class="form-control" id="title" name = "title" required>
                <small id="title_help" class="form-text text-muted">Provide Invoice Title.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="total_amount">Total Amount</label>
                <input type="text" class="form-control" id="total_amount" name = "total_amount" required>
                <small id="amount_help" class="form-text text-muted">Provide Total Amount.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="paid_amount">Paid Amount</label>
                <input type="text" class="form-control" id="paid_amount" name = "paid_amount" required>
                <small id="paid_amount_help" class="form-text text-muted">Provide Paid Amount.</small>
            </div>

            <div class="form-group col-md-12">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required >
                    <option value="">Select A Status</option>
                    <option value="paid">Paid</option>
                    <option value="unpaid">Unpaid</option>
                </select>
                <small id="status_help" class="form-text text-muted">Select Invoice Status.</small>
            </div>
        </div>
        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit">Create Invoice</button>
        </div>
    </form>

    <script>
        $(".ajaxForm").validate({}); // Jquery form validation initialization
        $(".ajaxForm").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, showAllInvoices);
        });
    </script>

    <script>
            function classWiseSection(class_id) {
            var url = '{{ route("section.show", "class_id") }}';
            url = url.replace('class_id', class_id);

            $.ajax({
                type : 'GET',
                url: url,
                success : function(response) {
                    $('#section_content_2').html(response);
                }
            });
        }
    </script>
