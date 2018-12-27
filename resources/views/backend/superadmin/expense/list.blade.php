<table class="table table-striped table-centered mb-0">
    <thead class="thead-dark">
    <tr>
        <th>Date</th>
        <th>Amount</th>
        <th>Expense Category</th>
        <th>Option</th>
    </tr>
    </thead>
    <tbody>
        @php
            $expenses = App\Expense::where('school_id', school_id())->where('session', get_settings('running_session'))->paginate(10);
        @endphp
    @foreach ($expenses as $expense)
        <tr>
            <td>
                {{ date('D, d-M-Y', $expense->date) }}
            </td>
            <td>{{ $expense->amount }}</td>
            <td>{{ $expense->expense_category->name }}</td>
            <td>
                <div class="btn-group mb-2">
                    <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('expense.edit', $expense->id) }}', 'Update Expense')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Expense info"> <i class="mdi mdi-wrench"></i> </button>
                    <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('expense.destroy', $expense->id) }}', 'expense_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Expense"> <i class="mdi mdi-window-close"></i> </button>
                </div>
            </td>
        </tr>
    @endforeach
    @if (sizeof(App\Expense::where('school_id', school_id())->where('session', get_settings('running_session'))->get()) == 0)
        <tr>
            <td colspan="4"> No Data Found</td>
        </tr>
    @endif
    </tbody>
</table>

<div class="row" style="float:right; margin-top: 10px;">
    <div class="col">
        {{ $expenses->links() }}
    </div>
</div>