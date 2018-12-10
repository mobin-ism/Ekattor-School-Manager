<select class="form-control" name="subject_id" id="subject_id" required>
    @if (count($subjects) == 0)
        <option value="">No Subjects Found</option>
    @else
        <option value="">Select A Subject</option>
        @foreach ($subjects as $subject)
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
        @endforeach
    @endif
</select>
