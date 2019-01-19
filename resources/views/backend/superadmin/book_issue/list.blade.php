@php
    $book_issues = App\BookIssue::where(['school_id'=> school_id(), 'session' => get_settings('running_session')])->where('issue_date', '>=', $date_from)->where('issue_date', '<=', $date_to)->get();
@endphp
@if (sizeof($book_issues) > 0)
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
        <thead class="thead-dark">
        <tr>
            <th>Book Name</th>
            <th>Issue Date</th>
            <th>Student</th>
            <th>Class</th>
            <th>Status</th>
            <th>Option</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($book_issues as $book_issue)
            <tr>
                <td>{{ $book_issue->book->name }}</td>
                <td>
                    {{ date('D, d/M/Y', $book_issue->issue_date) }}
                </td>
                <td>
                    {{ $book_issue->student->user->name}} <br> <small style="font-size: 10px; color: #9E9E9E;">Student Code: {{ $book_issue->student->code }}</small>
                </td>
                <td>
                    {{ $book_issue->class->name }}
                </td>
                <td>
                    @if ($book_issue->status)
                        <i class="mdi mdi-circle text-success"></i> Returned
                    @else
                        <i class="mdi mdi-circle text-disable"></i> Pending
                    @endif
                </td>
                <td>
                    <div class="btn-group mb-2">
                        <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('book_issue.edit', $book_issue->id) }}', 'Update Book Issue Information')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Book Issue info"> <i class="mdi mdi-wrench"></i> </button>
                        <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('book_issue.return', $book_issue->id) }}', showAllBookIssues )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Return this issued book"> <i class="mdi mdi-checkbox-marked-circle-outline"></i> </button>
                        <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('book_issue.destroy', $book_issue->id) }}', showAllBookIssues )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Book Issue Info"> <i class="mdi mdi-window-close"></i> </button>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <div style="text-align: center;">
        <img src="{{ asset('backend/images/empty_box.png') }}" alt="" height="150" width="200" style="text-align: center;  opacity: 0.8;">
        <p>Oops No Data Found...<a href="#" onclick="showAjaxModal('{{ route('book_issue.create') }}', 'Issue A Book')" style="color: #757575; font-weight: 800;">Click here.</a></p>
    </div>
@endif
