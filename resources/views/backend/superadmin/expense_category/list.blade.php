<table class="table table-striped table-centered mb-0">
    <thead class="thead-dark">
    <tr>
        <th>Name</th>
        <th>Option</th>
    </tr>
    </thead>
    <tbody>
    @foreach (App\ExpenseCategory::where('school_id', school_id())->where('session', get_settings('running_session'))->get() as $expense_category)
        <tr>
            <td>{{ $expense_category->name }}</td>
            <td>
                <div class="btn-group mb-2">
                    <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('expense_category.edit', $expense_category->id) }}', 'Update Expense Category')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Expense Category info"> <i class="mdi mdi-wrench"></i> </button>
                    <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('expense_category.destroy', $expense_category->id) }}', 'expense_category_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Expense Category"> <i class="mdi mdi-window-close"></i> </button>
                </div>
            </td>
        </tr>
    @endforeach
    @if (sizeof(App\ExpenseCategory::where('school_id', school_id())->where('session', get_settings('running_session'))->get()) == 0)
        <tr>
            <td colspan="2"> No Data Found</td>
        </tr>
    @endif
    </tbody>
</table>
