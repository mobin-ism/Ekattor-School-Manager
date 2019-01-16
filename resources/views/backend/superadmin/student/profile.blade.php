@php
    $enroll_details = \App\Enroll::where(['student_id' => $student_details->id, 'session' => get_settings('running_session'), 'school_id' => get_settings('selected_branch')])->get();
    $class_details = \App\Classes::find($enroll_details[0]->class_id);
    $section_details = \App\Section::find($enroll_details[0]->section_id);
    $parent_info = \App\User::find($student_details->parent_id);
@endphp

<div class="h-100">
    <div class="row align-items-center h-100">
        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
            <div class="text-center">
                @if (file_exists('backend/images/student_image/'.$student_details->id.'.jpg'))
                    <img src="{{ asset('backend/images/student_image/'.$student_details->id.'.jpg') }}" alt="" height="150" width="150">
                @else
                    <img src="http://wattleparkkgn.sa.edu.au/wp-content/uploads/2017/06/placeholder-profile-sq.jpg" alt="" height="150" width="150">
                @endif
                <div> <span style="font-weight: bold;">Name: </span> {{ $student_details->user->name }} </div>
                <div> <span style="font-weight: bold;">Student Code: </span> {{ $student_details->code }} </div>
            </div>
        </div>
        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="parent-tab" data-toggle="tab" href="#parent_info" role="tab" aria-controls="parent_info" aria-selected="false">Parent Info</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <table class="table table-centered mb-0">
                        <tbody>
                            <tr>
                                <td style="font-weight: bold;">Name:</td>
                                <td>{{ $student_details->user->name }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Class:</td>
                                <td>
                                    {{ $class_details->name }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Section:</td>
                                <td>
                                    {{ $section_details->name }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade show" id="parent_info" role="tabpanel" aria-labelledby="parent-tab">
                    <table class="table table-centered mb-0">
                        <tbody>
                            <tr>
                                <td style="font-weight: bold;">Parent Name:</td>
                                <td>{{ $parent_info->name }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Parent Email:</td>
                                <td>
                                    {{ $parent_info->email }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Parent Phone Number:</td>
                                <td>
                                    {{ $parent_info->phone }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


