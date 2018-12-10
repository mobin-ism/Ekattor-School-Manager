<select class="form-control" name="student_id" id="student_id" required>
    @if (count($students) == 0)
        <option value="">No Student Found</option>
    @else
        <option value="">Select A Student</option>
        @foreach ($students as $student)
            <option value="{{ $student->id }}">{{ $student->student->user->name }}</option>
        @endforeach
    @endif
</select>
