@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class=" mdi mdi-book-open-page-variant title_icon"></i> Books
                    <button type="button" class="btn btn-icon btn-success mb-1 alignToTitle" onclick="showAjaxModal('{{ route('book.create') }}', 'Add Books')"> <i class="mdi mdi-plus"></i> Add Book</button>
                </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id = "book_content">
                        @include('backend.'.Auth::user()->role.'.book.list')
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection
