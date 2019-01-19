@php
    if(isset($class_id) && $class_id > 0){
        if ($class_id == 'all')
            $subjects = \App\Subject::where('school_id', school_id())->get();
        else
            $subjects = \App\Subject::where('school_id', school_id())->where('class_id', $class_id)->get();
    }else {
        $subjects = \App\Subject::where('school_id', school_id())->get();
    }
@endphp
@if (count($subjects) > 0)
    <div class="table-responsive-sm">
        <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $subjects as $subject)
                    <tr>
                        <td> {{ $subject->name }} </td>
                        <td>
                            <div class="btn-group mb-2">
                                <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('subject.edit', $subject->id) }}', 'Update subject')"
                                    data-toggle="tooltip" data-placement="top" title="" data-original-title="Update subject"> <i class="mdi mdi-wrench"></i> </button>
                                <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('subject.destroy', $subject->id) }}', classWiseSubject )"
                                    data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete subject"> <i class="mdi mdi-window-close"></i> </button>
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
        <p>Oops No Data Found...<a href="#" onclick="showAjaxModal('{{ route('subject.create') }}', 'Add New Subject')" style="color: #757575; font-weight: 800;">Click here.</a></p>
    </div>
@endif

