@if (sizeof(App\Book::where(['school_id'=> school_id(), 'session' => get_settings('running_session')])->get()) > 0)
    <table class="table table-striped table-centered mb-0">
        <thead class="thead-dark">
        <tr>
            <th>Book Name</th>
            <th>Author</th>
            <th>Copies</th>
            <th>Available Copies</th>
            <th>Option</th>
        </tr>
        </thead>
        <tbody>
            @php
                $books = App\Book::where(['school_id'=> school_id(), 'session' => get_settings('running_session')])->paginate(10);
            @endphp
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->name }}</td>
                    <td>
                        {{ $book->author }}
                    </td>
                    <td>
                        {{ $book->copies }}
                    </td>
                    <td>
                        {{ $book->copies - count($book->book_issued) }}
                    </td>
                    <td>
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('book.edit', $book->id) }}', 'Update Book')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Book info"> <i class="mdi mdi-wrench"></i> </button>
                            <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('book.destroy', $book->id) }}', 'book_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Book"> <i class="mdi mdi-window-close"></i> </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row" style="float:right; margin-top: 10px;">
        <div class="col">
            {{ $books->links() }}
        </div>
    </div>
@endif
