@extends('backend.layout.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box ">
                <h4 class="page-title"> <i class="mdi mdi-view-dashboard title_icon"></i> Dashboard </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row ">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Overview</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card widget-flat" id="student" style="on">
                                        <div class="card-body">
                                            <div class="float-right">
                                                <i class="mdi mdi-account-multiple widget-icon"></i>
                                            </div>
                                            <h5 class="text-muted font-weight-normal mt-0" title="Number of Student"> <i class="mdi mdi-account-group title_icon"></i> Students  <a href="{{ route('student.index') }}" style="color: #6c757d; display: none;" id = "student_list"><i class = "mdi mdi-export"></i></a></h5>
                                            <h3 class="mt-3 mb-3">
                                                @php
                                                    $students = \App\Enroll::where(['session' => get_settings('running_session'), 'school_id' => school_id()])->get();
                                                    echo count($students);
                                                @endphp
                                            </h3>
                                            <p class="mb-0 text-muted">
                                                <span class="text-nowrap">Total Number Of Student</span>
                                            </p>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->

                                <div class="col-lg-6">
                                    <div class="card widget-flat" id="teacher" style="on">
                                        <div class="card-body">
                                            <div class="float-right">
                                                <i class="mdi mdi-account-multiple widget-icon"></i>
                                            </div>
                                            <h5 class="text-muted font-weight-normal mt-0" title="Number of Teacher"> <i class="mdi mdi-account-group title_icon"></i> Teacher  <a href="{{ route('teacher.index') }}" style="color: #6c757d; display: none;" id = "teacher_list"><i class = "mdi mdi-export"></i></a></h5>
                                            <h3 class="mt-3 mb-3">
                                                @php
                                                    $teachers = \App\User::where(['school_id' => school_id(), 'role' => 'teacher'])->get();
                                                    echo count($teachers);
                                                @endphp
                                            </h3>
                                            <p class="mb-0 text-muted">
                                                <span class="text-nowrap">Total Number Of Teacher</span>
                                            </p>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card widget-flat" id = "parent">
                                        <div class="card-body">
                                            <div class="float-right">
                                                    <i class="mdi mdi-account-multiple widget-icon"></i>
                                            </div>
                                            <h5 class="text-muted font-weight-normal mt-0" title="Number of Parents"> <i class="mdi mdi-account-group title_icon"></i> Parents  <a href="{{ route('parent.index') }}" style="color: #6c757d; display: none;" id = "parent_list"><i class = "mdi mdi-export"></i></a></h5>
                                            <h3 class="mt-3 mb-3">
                                                @php
                                                    $parents = \App\User::where(['school_id' => school_id(), 'role' => 'parent'])->get();
                                                    echo count($parents);
                                                @endphp
                                            </h3>
                                            <p class="mb-0 text-muted">
                                                <span class="text-nowrap">Total Number Of Parent</span>
                                            </p>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->

                                <div class="col-lg-6">
                                    <div class="card widget-flat">
                                        <div class="card-body">
                                            <div class="float-right">
                                                    <i class="mdi mdi-account-multiple widget-icon"></i>
                                            </div>
                                            <h5 class="text-muted font-weight-normal mt-0" title="Number of Staff"> <i class="mdi mdi-account-group title_icon"></i> Staff</h5>
                                            <h3 class="mt-3 mb-3">
                                                @php
                                                    $accountants = \App\User::where(['role' => 'accountant', 'school_id' => school_id()])->get();
                                                    $librarians = \App\User::where(['role' => 'librarian', 'school_id' => school_id()])->get();
                                                    echo count($accountants) + count($librarians);
                                                @endphp
                                            </h3>
                                            <p class="mb-0 text-muted">
                                                <span class="text-nowrap">Total Number Of Staff</span>
                                            </p>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
                            </div> <!-- end row -->
                        </div>
                    </div>
                </div> <!-- end col -->
                <div class="col-xl-4">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <h4 class="header-title text-white mb-2">Todays Attendance</h4>
                            <div class="text-center">
                                <h3 class="font-weight-normal text-white mb-2">
                                    @php
                                        $attendance = \App\DailyAttendance::where('timestamp', strtotime(date('Y-m-d')))->where('school_id', school_id())->where('status', 1)->get();
                                        echo count($attendance);
                                    @endphp
                                </h3>
                                <p class="text-light text-uppercase font-13 font-weight-bold">{{ count($attendance) }} Student is attending today</p>
                                <a href="{{ route('daily_attendance.index') }}" class="btn btn-outline-light btn-sm mb-1">Go To Attendance
                                    <i class="mdi mdi-arrow-right ml-1"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Recent Events <a href="{{ route('event_calendar.index') }}" style="color: #6c757d;"><i class = "mdi mdi-export"></i></a></h4>
                            @include('backend.'.Auth::user()->role.'.dashboard.events')
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col-->
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Accounts Of {{ date('F') }}  <a href="{{ route('invoice.index') }}" style="color: #6c757d"><i class = "mdi mdi-export"></i></a></h4>
                            @include('backend.'.Auth::user()->role.".dashboard.invoice")
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Expense Of {{ date('F') }} <a href="{{ route('expense.index') }}" style="color: #6c757d"><i class = "mdi mdi-export"></i></a></h4>
                            @include('backend.'.Auth::user()->role.".dashboard.expense")
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            initDataTable("expense-datatable");
        });

        $(".widget-flat").mouseenter(function() {
            var id = $(this).attr('id');
            $('#'+id+'_list').show();
        }).mouseleave(function() {
            var id = $(this).attr('id');
            $('#'+id+'_list').hide();
        });
    </script>
@endsection
