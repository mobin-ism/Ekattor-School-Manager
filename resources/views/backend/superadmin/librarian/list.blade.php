@php
    $librarians = \App\User::where('school_id', school_id())->where('role', 'librarian')->get();
@endphp
@if (count($librarians) > 0)
    <div class="table-responsive-sm">
        <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Option</th>
                </tr>
            </thead>
                <tbody>
                    @foreach ( $librarians as $librarian)
                        <tr>
                            <td> {{ $librarian->name }} </td>
                            <td> {{ $librarian->email }} </td>
                            <td>
                                <div class="btn-group mb-2">
                                    <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('librarian.edit', $librarian->id) }}', 'Update Librarian')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Librarian info"> <i class="mdi mdi-wrench"></i> </button>
                                    <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('librarian.destroy', $librarian->id) }}', showAllLibrarians )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Librarian"> <i class="mdi mdi-window-close"></i> </button>
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
        <p>Oops No Data Found...<a href="#" onclick="showAjaxModal('{{ route('librarian.create') }}', 'Add New Librarian')" style="color: #757575; font-weight: 800;">Click here.</a></p>
    </div>
@endif


