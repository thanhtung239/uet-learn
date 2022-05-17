<div class="direction">
    <div class="container direction-txt">
        <span>
            <a href="{{ route('home') }}">Home</a>
            >
            <a href="{{ route('courses.index') }}">All courses</a>
            @if (isset($course->id))
                >
                <a href="{{ route('courses.show', $course->id) }}">{{ $course->title }}</a>
            @endif
            @if (isset($lesson->id))
                >
                <a href="{{ route('course.lessons.show', [$course->id, $lesson->id]) }}">{{ $lesson->title }}</a>
            @endif
            @if (isset($document->id))
                >
                <a href="{{ route('documents.show', $document->id) }}">{{ $document->name }}</a>
            @endif
        </span>
    </div>
</div>
