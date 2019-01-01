@php
    $expense_categories = App\ExpenseCategory::where('school_id', school_id())->where('session', get_settings('running_session'))->get();
@endphp
@if (count($expense_categories) > 0)
<button type="button" class="btn btn-icon btn-success mb-1" style="float: right;" onclick="showAjaxModal('{{ route('expense_category.create') }}', 'Create New Exam')"> <i class="mdi mdi-plus"></i> Add Expense Category</button>
<div class="table-responsive-sm">
    <table class="table table-striped table-centered mb-0">
        <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Option</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($expense_categories as $expense_category)
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
        </tbody>
    </table>
</div>

@else
    <div style="text-align: center;">
        <img src="{{ asset('backend/images/empty_box.png') }}" alt="" height="150" width="200" style="text-align: center;  opacity: 0.8;">
        <p>Oops No Data Found...<a href="#" onclick="showAjaxModal('{{ route('expense_category.create') }}', 'Create New Exam')" style="color: #757575; font-weight: 800;">Click here.</a></p>
    </div>
@endif

