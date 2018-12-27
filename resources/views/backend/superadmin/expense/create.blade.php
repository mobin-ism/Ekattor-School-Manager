<form method="POST" class="d-block ajaxForm" action="{{ route('expense.store') }}">
    @csrf

    <div class="form-group col-md-12">
        <label for="date">Date</label>
        <input type="text" class="form-control date" id="date" data-toggle="date-picker" data-single-date-picker="true" name = "date" value="" required>
        <small id="date_help" class="form-text text-muted">Select A Date.</small>
    </div>

    <div class="form-group col-md-12">
        <label for="amount">Amount</label>
        <input type="text" class="form-control" id="amount" name = "amount" required>
        <small id="amount_help" class="form-text text-muted">Provide An Amount.</small>
    </div>

    <div class="form-group col-md-12">
        <label for="expense_category_id">Expense Category</label>
        <select class="form-control" name="expense_category_id" id="expense_category_id">
            <option value="">Select An Expense Category</option>
            @foreach (App\ExpenseCategory::where(['school_id' => school_id(), 'session' => get_settings('running_session')])->get() as $expense_category)
                <option value="{{ $expense_category->id }}">{{ $expense_category->name }}</option>
            @endforeach
        </select>
        <small id="expense_category_id_help" class="form-text text-muted">Select an expense category.</small>
    </div>

    <div class="form-group  col-md-12">
        <button class="btn btn-block btn-primary" type="submit">Create Expense</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#date').daterangepicker();
    });

    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, 'expense_content');
    });
</script>