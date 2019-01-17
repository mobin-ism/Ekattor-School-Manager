@php
    $parents = \App\User::where('school_id', school_id())->where('role', 'parent')->paginate(10);
@endphp

@if (count($parents) > 0)
    <div class="table-responsive-sm">
        <table class="table table-striped table-centered mb-0 colorfulTable">
            <thead class="thead-dark">
                <tr>
                    <th>Parent Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $parents as $parent)
                    <tr>
                        <td> {{ $parent->id }} </td>
                        <td> {{ $parent->name }} </td>
                        <td> {{ $parent->email }} </td>
                        <td>
                            <div class="btn-group mb-2">
                                {{-- <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('parent.show', $parent->id) }}', '')" data-toggle="tooltip" data-placement="top" title="" data-original-title=""> <i class="dripicons-checklist"></i> </button> --}}
                                <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('parent.edit', $parent->id) }}', 'Update Parent')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Parent info"> <i class="mdi mdi-wrench"></i> </button>
                                <button type="button" class="btn btn-icon btn-dark btn-sm"      style="margin-right:5px;" onclick="confirm_modal('{{ route('parent.destroy', $parent->id) }}', showAllParents )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Parent"> <i class="mdi mdi-window-close"></i> </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p style="margin-top: 20px;"><small>Total {{ count($parents) }} entries found. </small></p>

        <div class="row">
            <div class="col">
                    {{ $parents->links() }}
            </div>
        </div>
    </div>
@else
    <div style="text-align: center;">
        <img src="{{ asset('backend/images/empty_box.png') }}" alt="" height="150" width="200" style="text-align: center;  opacity: 0.8;">
        <p>Oops No Data Found...<a href="#" onclick="showAjaxModal('{{ route('parent.create') }}', 'Add New Parent')" style="color: #757575; font-weight: 800;">Click here.</a></p>
    </div>
@endif

