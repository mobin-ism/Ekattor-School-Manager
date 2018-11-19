<table class="table table-hover table-centered mb-0">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Option</th>
        </tr>
    </thead>
        <tbody>
        @php
        $accountants = \App\User::where('school_id', 1)->where('role', 5)->paginate(10);
        @endphp
            @foreach ( $accountants as $accountant)
                <tr>
                    <td> {{ $accountant->name }} </td>
                    <td> {{ $accountant->email }} </td>
                    <td>
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-icon btn-warning" style="margin-right:5px;" onclick="showAjaxModal('{{ route('accountant.edit', $accountant->id) }}')"> <i class="mdi mdi-wrench"></i> </button>
                            <button type="button" class="btn btn-icon btn-danger" style="margin-right:5px;" onclick="confirm_modal('{{ route('accountant.destroy', $accountant->id) }}', 'accountant_content' )"> <i class="mdi mdi-window-close"></i> </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            @if (count($accountants) == 0)
                <tr>
                    <td colspan="4">No Data Found</td>
                </tr>
            @endif
        </tbody>
    </table>

    {{-- <div class="row justify-content-md-center"> --}}
    <div class="row">
        {{-- <div class="col-auto"> --}}
        <div class="col">
                {{ $accountants->links() }}
        </div>
    </div>

