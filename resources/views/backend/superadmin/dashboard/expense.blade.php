@php
    $date_from = date('Y-m-01')." 00:00:00"; // hard-coded '01' for first day
    $date_to   = date('Y-m-t')." 23:59:59";
    $expenses = App\Expense::where('school_id', school_id())->where('session', get_settings('running_session'))->where('date', '>=', strtotime($date_from))->where('date', '<=', strtotime($date_to))->get();
@endphp
@if (count($expenses) > 0)
    <div class="table-responsive-sm">
        <table class="table table-striped table-centered table-bordered mb-0 table-responsive">
            <thead>
            <tr>
                <th width = "60%">Expense</th>
                <th width = "40%">Amount</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($expenses as $expense)
                <tr>
                    <td>{{ $expense->expense_category->name }}</td>
                    <td>{{ $expense->amount }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <div style="text-align: center;">
        <img src="{{ asset('backend/images/empty_box.png') }}" alt="" height="150" width="200" style="text-align: center;  opacity: 0.8;">
        <p>Oops No Data Found...<a href="#" onclick="showAjaxModal('{{ route('expense.create') }}', 'Create New Expense')" style="color: #757575; font-weight: 800;">Click here.</a></p>
    </div>
@endif

<style>
    .table-responsive {
        display: inline-table;
    }
</style>


