@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-database title_icon"></i> Expense
                <button type="button" class="btn btn-icon btn-success btn-rounded alignToTitle" onclick="showAjaxModal('{{ route('expense.create') }}', 'Create New Expense')"> <i class="mdi mdi-plus"></i> Add Expense</button></h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-md-center" style="margin-bottom: 10px;">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <input type="text" class="form-control date" id="singledaterange" data-toggle="date-picker" data-cancel-class="btn-warning">
                            {{-- <input type="text" class="form-control date" id="date" data-toggle="date-picker" data-single-date-picker="true" name = "date" value="" required> --}}
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <select class="form-control" name="expense_category_id" id="expense_category_id" onchange="error()">
                                <option value="all">Expense Category</option>
                                @foreach (App\ExpenseCategory::where(['school_id' => school_id(), 'session' => get_settings('running_session')])->get() as $expense_category)
                                    <option value="{{ $expense_category->id }}">{{ $expense_category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
                            <button type="button" class="btn btn-icon btn-secondary form-control">Filter</button>
                        </div>
                    </div>
                    <div id = "expense_content">
                        @include('backend.'.Auth::user()->role.'.expense.list')
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('scripts')
    <script>
        function error() {
            toastr.error('Havent done yet');
        }
    </script>
@endsection
