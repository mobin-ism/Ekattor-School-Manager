@extends('backend.layout.main')
@section('content')
<!-- start page title -->

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Student Admission Form</h4>
        </div>
    </div>
</div>
<!-- end page title -->
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3">
                        <li class="nav-item" data-target-form="#accountForm">
                            <a href="{{ route('student.create') }}" class="nav-link rounded-0 pt-2 pb-2 active show">
                                <i class="mdi mdi-account-circle mr-1"></i>
                                <span class="d-none d-sm-inline">Update Student Information</span>
                            </a>
                        </li>
                    </ul>
                    <form method="POST" class="col-12 ajaxForm" action="{{ route('student.update', $students->id) }}" id = "student_update_form">
                        @csrf
                        @method('PATCH')
                        <div class="col-12">
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="name"> Name</label>
                                <div class="col-md-9">
                                    <input type="text" id="name" name="name" class="form-control"  value="{{ $students->user->name }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="email">Email</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $students->user->email }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="parent_id"> Parent</label>
                                <div class="col-md-9">
                                    <select id="parent_id" name="parent_id" class="form-control" required >
                                        <option value="">Select A Parent</option>
                                        @foreach (\App\User::where('school_id', get_settings('selected_branch'))->where('role', 'parent')->get() as $parent)
                                            <option value="{{ $parent->id }}" @if($parent->id == $students->parent_id) selected @endif>{{ $parent->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                    @php
                        $query = \App\Enroll::where(array('student_id' => $students->id, "session" => get_settings('running_session')))->first();
                        $class_id   = $query->class_id;
                        $section_id = $query->section_id;
                    @endphp
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="class_id"> Class</label>
                                <div class="col-md-9">
                                    <select name="class_id" id="class_id" class="form-control" onchange="classWiseSection(this.value)" required>
                                        <option value="">Class</option>
                                        @foreach (App\Classes::where('school_id', 1)->get() as $class)
                                            <option value="{{ $class->id }}" @if($class_id == $class->id) selected @endif>{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="section_id"> Section</label>
                                <div class="col-md-9" id = "section_content">
                                    @php
                                        $sections = \App\Section::where('class_id', $class_id)->get();
                                    @endphp
                                    <select name="section_id" id="section_id" class="form-control" required >
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}" @if($section_id == $section->id) selected @endif>{{ $section->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="birthdatepicker">Birthday</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" name = "birthday"   value="{{ date('m/d/Y', $students->user->birthday) }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="gender">Gender</label>
                                <div class="col-md-9">
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option value="">Select gender</option>
                                        <option value="male" @if($students->user->gender == 'male') selected @endif>Male</option>
                                        <option value="female" @if($students->user->gender == 'female') selected @endif>Female</option>
                                        <option value="others" @if($students->user->gender == 'others') selected @endif>Others</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="example-textarea"> Address </label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="example-textarea" rows="5" name = "address" >{{ $students->user->address }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="phone"> Phone</label>
                                <div class="col-md-9">
                                    <input type="text" id="phone" name="phone" class="form-control"  value="{{ $students->user->phone }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="example-fileinput"> Student Profile Image</label>
                                <div class="col-md-9">
                                    <input type="file" id="example-fileinput" name="student_image" class="form-control-file">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-secondary col-md-4 col-sm-12" onclick="hello()">Update Student</button>
                            </div>
                        </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection

@section('scripts')
    <script>
        function classWiseSection(class_id) {
            var url = '{{ route("section.show", "class_id") }}';
            url = url.replace('class_id', class_id);

            $.ajax({
                type : 'GET',
                url: url,
                success : function(response) {
                    $('#section_content').html(response);
                }
            });
        }

        function onChangeSection(section_id) {

        }

        $(".ajaxForm").validate({});
        $("#student_update_form").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, 'update_form');
        });

    </script>
@endsection


