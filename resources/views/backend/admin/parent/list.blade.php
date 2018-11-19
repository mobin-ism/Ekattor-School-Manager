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
            $parents = \App\User::where('school_id', 1)->where('role', 4)->paginate(10);
            @endphp
                @foreach ( $parents as $parent)
                    <tr>
                        <td> {{ $parent->name }} </td>
                        <td> {{ $parent->email }} </td>
                        <td>
                            <div class="btn-group mb-2">
                                <button type="button" class="btn btn-icon btn-info" style="margin-right:5px;" onclick="showAjaxModal('{{ route('parent.show', $parent->id) }}')"> <i class="dripicons-checklist"></i> </button>
                                <button type="button" class="btn btn-icon btn-warning" style="margin-right:5px;" onclick="showAjaxModal('{{ route('parent.edit', $parent->id) }}')"> <i class="mdi mdi-wrench"></i> </button>
                                <button type="button" class="btn btn-icon btn-danger" style="margin-right:5px;" onclick="confirm_modal('{{ route('parent.destroy', $parent->id) }}', 'parent_content' )"> <i class="mdi mdi-window-close"></i> </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if (count($parents) == 0)
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
                    {{ $parents->links() }}
            </div>
        </div>

