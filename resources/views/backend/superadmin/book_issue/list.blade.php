<table class="table table-striped table-centered mb-0">
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
            @php
                $book_issues = App\BookIssue::where(['school_id'=> school_id(), 'session' => get_settings('running_session')])->paginate(10);
            @endphp
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
                        <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('book_issue.return', $book_issue->id) }}', 'book_issue_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Return this issued book"> <i class="mdi mdi-checkbox-marked-circle-outline"></i> </button>
                        <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('book_issue.destroy', $book_issue->id) }}', 'book_issue_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Book Issue Info"> <i class="mdi mdi-window-close"></i> </button>
                    </div>
                </td>
            </tr>
        @endforeach
        @if (sizeof(App\BookIssue::where(['school_id'=> school_id(), 'session' => get_settings('running_session')])->get()) == 0)
            <tr>
                <td colspan="5"> No Data Found</td>
            </tr>
        @endif
        </tbody>
    </table>

    <div class="row" style="float:right; margin-top: 10px;">
        <div class="col">
            {{ $book_issues->links() }}
        </div>
    </div>
