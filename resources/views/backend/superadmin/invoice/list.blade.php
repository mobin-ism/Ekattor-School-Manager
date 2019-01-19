<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead class="thead-dark">
    <tr>
        <th>Student</th>
        <th>Class</th>
        <th>Invoice Title</th>
        <th>Total amount</th>
        <th>Paid amount</th>
        <th>Status</th>
        <th>Creation Date</th>
        <th>Option</th>
    </tr>
    </thead>
    <tbody>
        @php
            $invoices = App\Invoice::where(['school_id'=> school_id(), 'session' => get_settings('running_session')])->where('created_at', '>=', date('Y-m-d h:i:s', $date_from))->where('created_at', '<=', date('Y-m-d h:i:s', $date_to))->get();
        @endphp
    @foreach ($invoices as $invoice)
        {{-- @if (strtotime($invoice->created_at) >= $date_from && strtotime($invoice->created_at) <= $date_to) --}}
            <tr>
                <td>{{ $invoice->student->user->name }}</td>
                <td>
                    {{ $invoice->class->name }}
                </td>
                <td>
                    {{ $invoice->title }}
                </td>
                <td>
                    {{ $invoice->total_amount }}
                </td>
                <td>
                    {{ $invoice->paid_amount }}
                </td>
                <td>
                    {{ ucfirst($invoice->status) }}
                </td>
                <td>
                    {{ date('D, d-M-Y', strtotime($invoice->created_at)) }}
                </td>
                <td>
                    <div class="btn-group mb-2">
                        <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('invoice.single.edit', $invoice->id) }}', 'Update invoice')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update invoice info"> <i class="mdi mdi-wrench"></i> </button>
                        <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('invoice.destroy', $invoice->id) }}', showAllInvoices )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete invoice"> <i class="mdi mdi-window-close"></i> </button>
                    </div>
                </td>
            </tr>
        {{-- @endif --}}
    @endforeach
    @if (sizeof(App\Invoice::where(['school_id'=> school_id(), 'session' => get_settings('running_session')])->get()) == 0)
        <tr>
            <td colspan="8"> No Data Found</td>
        </tr>
    @endif
    </tbody>
</table>
