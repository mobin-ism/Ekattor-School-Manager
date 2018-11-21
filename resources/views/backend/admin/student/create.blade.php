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
                    <form method="POST" class="" action="{{ route('student.store') }}">
                        @csrf
                        <div id="progressbarwizard">
                            <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3">
                                <li class="nav-item" data-target-form="#accountForm">
                                    <a href="#first" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                        <i class="mdi mdi-account-circle mr-1"></i>
                                        <span class="d-none d-sm-inline">Account</span>
                                    </a>
                                </li>
                                <li class="nav-item" data-target-form="#profileForm">
                                    <a href="#second" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                        <i class="mdi mdi-face-profile mr-1"></i>
                                        <span class="d-none d-sm-inline">Profile</span>
                                    </a>
                                </li>
                                <li class="nav-item" data-target-form="#otherForm">
                                    <a href="#third" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                        <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                                        <span class="d-none d-sm-inline">Finish</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content mb-0 b-0">
                                <div id="bar" class="progress mb-3" style="height: 7px;">
                                    <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                                </div>

                                <div class="tab-pane" id="first">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="email">Email</label>
                                                    <div class="col-md-9">
                                                        <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" id="email" name="email" value="{{ old('email') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="password"> Password</label>
                                                    <div class="col-md-9">
                                                        <input type="password" id="password" name="password" class="form-control {{ $errors->has('password') ? 'error' : '' }}"  value="{{ old('password') }}">
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        {{-- Navigation button --}}
                                        <ul class="list-inline wizard mb-0">
                                                <li class="previous list-inline-item"><a href="#" class="btn btn-info">Previous</a>
                                                </li>
                                                <li class="next list-inline-item float-right"><button type = "button" href="#" class="btn btn-info">Next</button></li>
                                            </ul>
                                </div>

                                <div class="tab-pane fade" id="second">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="name"> Name</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'error' : '' }}"  value="{{ old('name') }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="parent_id"> Parent</label>
                                                    <div class="col-md-9">
                                                        <select id="parent_id" name="parent_id" class="form-control {{ $errors->has('parent_id') ? 'error' : '' }}" >
                                                            <option value="">Select A Parent</option>
                                                            @foreach (\App\User::where('school_id', get_settings('selected_branch'))->where('role', 4)->get() as $parent)
                                                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="class_id"> Class</label>
                                                    <div class="col-md-9">
                                                        <select name="class_id" id="class_id" class="form-control {{ $errors->has('class_id') ? 'error' : '' }}" onchange="classWiseSection(this.value)" >
                                                            <option value="">Class</option>
                                                            @foreach (App\Classes::where('school_id', 1)->get() as $class)
                                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="section_id"> Section</label>
                                                    <div class="col-md-9" id = "section_content">
                                                        <select name="section_id" id="section_id" class="form-control {{ $errors->has('section_id') ? 'error' : '' }}"  >
                                                            <option value="">Select A Class First</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="code">Student Code</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="code" name="code" class="form-control {{ $errors->has('code') ? 'error' : '' }}"  value="{{ substr(md5(uniqid(rand(), true)), 0, 7) }}" >
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="birthdatepicker">Birthday</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control date {{ $errors->has('birthday') ? 'error' : '' }}" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" name = "birthday"   value="{{ old('birthday') }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="gender">Gender</label>
                                                    <div class="col-md-9">
                                                        <select name="gender" id="gender" class="form-control {{ $errors->has('gender') ? 'error' : '' }}" >
                                                            <option value="">Select gender</option>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                            <option value="others">Others</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="example-textarea"> Address </label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control {{ $errors->has('address') ? 'error' : '' }}" id="example-textarea" rows="5" name = "address" >{{ old('address') }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="phone"> Phone</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="phone" name="phone" class="form-control {{ $errors->has('phone') ? 'error' : '' }}"  value="{{ old('phone') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        {{-- Navigation button --}}
                                        <ul class="list-inline wizard mb-0">
                                            <li class="previous list-inline-item"><a href="#" class="btn btn-info">Previous</a>
                                            </li>
                                            <li class="next list-inline-item float-right"><button type = "button" href="#" class="btn btn-info">Next</button></li>
                                        </ul>
                                </div>

                                <div class="tab-pane fade" id="third">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="text-center">
                                                    <h2 class="mt-0">
                                                        <i class="mdi mdi-check-all"></i>
                                                    </h2>
                                                    <h3 class="mt-0">Thank you !</h3>

                                                    <p class="w-75 mb-2 mx-auto">You are almost there. Just make sure that you have inserted all the fields correctly...</p>

                                                    <div class="mb-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck4" >
                                                            <label class="custom-control-label" for="customCheck4">I agree with the Terms and Conditions</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                        {{-- Navigation button --}}
                                        <ul class="list-inline wizard mb-0">
                                            <li class="previous list-inline-item"><a href="#" class="btn btn-info">Previous</a>
                                            </li>
                                            <li class="next list-inline-item float-right"><button type = "submit" href="#" class="btn btn-info">Submit</button></li>
                                        </ul>
                                </div>
                            </div> <!-- tab-content -->
                        </div> <!-- end #rootwizard-->
                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

    <div class="notification is-danger">
        @php
            foreach ($errors->all() as $error){
                flash($error)->error();
            }
        @endphp
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
    </script>
@endsection
