@php
    $sessions = App\Session::where('school_id', school_id())->get();
@endphp
@if (count($sessions) > 0)
    <div class="row">
        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <select class="form-control select2" data-toggle="select2" id = "session_dropdown">
                                <option value = "0">Session List</option>
                                @foreach (App\Session::where('school_id', school_id())->get() as $session)
                                    <option value="{{ $session->id }}" @if($session->id == get_settings('running_session')) selected @php $current_session = $session->name; @endphp @endif>{{ $session->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12" style="float: left;">
                            <button type="button" class="btn btn-icon btn-secondary" onclick="makeSessionActive()"> <i class="mdi mdi-check"></i> Activate</button>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 mt-1">
                            <div class="alert alert-info" role="alert">Active Session {{ $current_session }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-striped table-centered mb-0">
                            <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($sessions as $session)
                                <tr>
                                    <td>{{ $session->name }}</td>
                                    <td>
                                        @if ($session->id == get_settings('running_session'))
                                            <i class="mdi mdi-circle text-success"></i> Active
                                        @else
                                            <i class="mdi mdi-circle text-disable"></i> Deactive
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group mb-2">
                                            <button type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="showAjaxModal('{{ route('session_manager.edit', $session->id) }}', 'Update Session')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Session info"> <i class="mdi mdi-wrench"></i> </button>
                                            <button type="button" class="btn btn-icon btn-dark btn-sm" style="margin-right:5px;" onclick="confirm_modal('{{ route('session_manager.destroy', $session->id) }}', 'session_content' )" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Session"> <i class="mdi mdi-window-close"></i> </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div style="text-align: center;">
        <img src="{{ asset('backend/images/empty_box.png') }}" alt="" height="150" width="200" style="text-align: center;  opacity: 0.8;">
        <p>Oops No Data Found...<a href="#" onclick="showAjaxModal('{{ route('session_manager.create') }}', 'Create New Session')" style="color: #757575; font-weight: 800;">Click here.</a></p>
    </div>
@endif

