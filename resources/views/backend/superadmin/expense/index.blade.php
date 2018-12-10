@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="mdi mdi-database title_icon"></i> Expense</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-10 offset-xl-1">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-icon btn-success" style="float: right;" onclick="showAjaxModal('{{ route('expense.create') }}', 'Create New Expense')"> <i class="mdi mdi-plus"></i> Add Expense</button>
                    <h4 class="header-title mt-3">Expense List</h4>
                    <div class="row justify-content-md-center" style="margin-bottom: 10px;">
                        <div class="col-md-4">
                            <input type="text" class="form-control date" id="singledaterange" data-toggle="date-picker" data-cancel-class="btn-warning">
                            {{-- <input type="text" class="form-control date" id="date" data-toggle="date-picker" data-single-date-picker="true" name = "date" value="" required> --}}
                        </div>

                        <div class="col-md-4">
                            <select class="form-control" name="expense_category_id" id="expense_category_id" onchange="error()">
                                <option value="all">Expense Category</option>
                                @foreach (App\ExpenseCategory::where(['school_id' => school_id(), 'session' => get_settings('running_session')])->get() as $expense_category)
                                    <option value="{{ $expense_category->id }}">{{ $expense_category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive-sm" id = "expense_content">
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
