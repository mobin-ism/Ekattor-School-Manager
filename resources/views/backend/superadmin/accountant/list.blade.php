@php
    $accountants = \App\User::where('school_id', get_settings('selected_branch'))->where('role', 'accountant')->paginate(10);
@endphp
@if (count($accountants) > 0)
    <button type="button" class="btn btn-icon btn-success mb-1" style="float: right;" onclick="showAjaxModal('{{ route('accountant.create') }}', 'Create Accountant')"> <i class="mdi mdi-plus"></i> Add New Accountant</button>
    <div class="table-responsive-sm">
        <table class="table table-striped table-centered mb-0 colorfulTable">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $accountants as $accountant)
                    <tr>
                        <td> {{ $accountant->name }} </td>
                        <td> {{ $accountant->email }} </td>
                        <td>
                            <div class="btn-group mb-2">
                                <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('accountant.edit', $accountant->id) }}', 'Update Accountant')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Accountant info"> <i class="mdi mdi-wrench"></i> </button>
                                <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('accountant.destroy', $accountant->id) }}', 'accountant_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Accountant"> <i class="mdi mdi-window-close"></i> </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p style="margin-top: 20px;"><small>Total {{ count($accountants) }} entries found. </small></p>

        <div class="row">
            <div class="col">
                    {{ $accountants->links() }}
            </div>
        </div>
    </div>
@else
    <div style="text-align: center;">
        <img src="{{ asset('backend/images/empty_box.png') }}" alt="" height="150" width="200" style="text-align: center;  opacity: 0.8;">
        <p>Oops No Data Found...<a href="#" onclick="showAjaxModal('{{ route('accountant.create') }}', 'Add New Accountant')" style="color: #757575; font-weight: 800;">Click here.</a></p>
    </div>
@endif



