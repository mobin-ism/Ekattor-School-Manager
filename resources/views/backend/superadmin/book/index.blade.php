@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class=" mdi mdi-book-open-page-variant title_icon"></i> Books</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-10 offset-xl-1">
            <div class="card">
                <div class="card-body">
                    @if (sizeof(App\Book::where(['school_id'=> school_id(), 'session' => get_settings('running_session')])->get()) > 0)
                        <button type="button" class="btn btn-icon btn-success mb-1" style="float: right;" onclick="showAjaxModal('{{ route('book.create') }}', 'Add Books')"> <i class="mdi mdi-plus"></i> Add Book</button>
                        <div class="table-responsive-sm" id = "book_content">
                            @include('backend.'.Auth::user()->role.'.book.list')
                        </div> <!-- end table-responsive-->
                    @else
                        <div style="text-align: center;">
                            <img src="{{ asset('backend/images/empty_box.png') }}" alt="" height="150" width="200" style="text-align: center;  opacity: 0.8;">
                            <p>Oops No Data Found...<a href="#" onclick="showAjaxModal('{{ route('book.create') }}', 'Add Books')" style="color: #757575; font-weight: 800;">Click here.</a></p> 
                        </div>
                    @endif
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection
