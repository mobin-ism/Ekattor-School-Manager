@php
    $columns  = Schema::getColumnListing('teacher_permissions');
@endphp

<table class="table table-hover table-centered mb-0">
        <thead>
            <tr>
                <td> Teacher </td>
                @foreach ($columns as $column)
                @php
                    if ($column == 'class_id' || $column == 'section_id' || $column == 'created_at' || $column == 'updated_at' || $column == 'teacher_id' || $column == 'id')
                        continue;
                @endphp
                    <td>{{ ucfirst(str_replace('_', ' ', $column)) }}</td>
                @endforeach
            </tr>
        </thead>
        <tbody>
                @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->user->name }}</td>
                    @foreach ($columns as $column)
                    @php
                        if ($column == 'class_id' || $column == 'section_id' || $column == 'created_at' || $column == 'updated_at' || $column == 'teacher_id' || $column == 'id')
                            continue;
                    @endphp
                    <td>
                            {{-- <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="{{ $attribute }}_switch_{{ $teacher->id }}">
                                <label class="custom-control-label" for="{{ $attribute }}_switch_{{ $teacher->id }}">&nbsp;</label>
                            </div> --}}
                        {{-- <input type="checkbox" id="{{ $attribute }}_switch_{{ $teacher->id }}" data-switch="none"/>
                        <label for="{{ $attribute }}_switch_{{ $teacher->id }}" data-on-label="" data-off-label=""></label> --}}

                        <input type="checkbox" id="{{ $column }}_switch_{{ $teacher->id }}" data-switch="info"/>
                        <label for="{{ $column }}_switch_{{ $teacher->id }}" data-on-label="On" data-off-label="Off"></label>
                    </td>
                    @endforeach
                </tr>
                @endforeach
        </tbody>
    </table>
