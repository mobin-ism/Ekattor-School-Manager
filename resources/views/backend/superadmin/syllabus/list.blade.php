@if(isset($syllabuses) && count($syllabuses))
    <table class="table table-striped table-centered mb-0">
        <thead class="thead-dark">
        <tr>
            <th>Title</th>
            <th>Syllabus</th>
            <th>Subject</th>
            <th>Date Added</th>
            <th>Option</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($syllabuses as $syllabus)
            <tr>
                <td>{{ $syllabus->title }}</td>

                <td>
                    <a href="{{ asset('backend/files/syllabus/'.$syllabus->file) }}" download>Download</a>
                </td>
                <td>
                    {{ $syllabus->subject->name }}
                </td>
                <td>
                    {{ date('D, d-M-Y', strtotime($syllabus->created_at)) }}
                </td>
                <td>
                    <div class="btn-group mb-2">
                        <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('syllabus.destroy', $syllabus->id) }}', classAndSectionWiseSyllabus )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Syllabus"> <i class="mdi mdi-window-close"></i> </button>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="row" style="float:right; margin-top: 10px;">
        <div class="col">
            {{ $syllabuses->links() }}
        </div>
    </div>
@else
    <div style="text-align: center;">
        <img src="{{ asset('backend/images/empty_box.png') }}" alt="" height="150" width="200" style="text-align: center;  opacity: 0.8;">
        <p>Oops No Data Found...<a href="#" onclick="showAjaxModal('{{ route('syllabus.create') }}', 'Add New Syllabys')" style="color: #757575; font-weight: 800;">Click here.</a></p>
    </div>
@endif

