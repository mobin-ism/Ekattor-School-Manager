@if (isset($entries))

<button class="btn btn-secondary col-5" onclick="mark_all_present(event)">Mark As Present</button>
<button class="btn btn-secondary col-5" onclick="mark_all_absent(event)">Mark As Absent</button>

<div class="table-responsive-sm row col-md-12" style="padding-right: 0px;">
    <table class="table table-bordered table-centered mb-0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entries as $entry)
                <tr>
                    <td>
                        {{ App\Student::find($entry->student_id)->user->name }}
                    </td>
                    <td>
                        <div class="custom-control custom-radio">
                            {{--  <input type="radio" id="{{ 'status_'.$entry->id }}" name="{{ 'status_'.$entry->id }}" value="1" class="custom-control-input">
                            <label class="custom-control-label" for="{{ 'status_'.$entry->id }}">Present</label>  --}}
                            <input type="radio" id="" name="{{ 'status_'.$entry->id }}" value="1" class="" @if ($entry->status == 1) checked @endif > Present &nbsp;
                            <input type="radio" id="" name="{{ 'status_'.$entry->id }}" value="0" class="" @if ($entry->status == 0) checked @endif> Absent &nbsp;
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@else
@php
    $entries = array();
@endphp
@endif

<script type="text/javascript">
    function mark_all_present(e) {
        e.preventDefault();
        var count = '{{ count($entries) }}';
        for(var i = 0; i < count; i++){
            $(":radio[value=1]").prop('checked', true);
        }
        //$("input:radio").attr("checked", "checked");
    }

    function mark_all_absent(e) {
        e.preventDefault();
        var count= '{{ count($entries) }}';
        for(var i=0;i<count;i++) {
            $(":radio[value=0]").prop('checked',true);
        }
    }
</script>


