@extends('layouts.app')
@section('content')
	@include('components.direction')
	<div class="container mt-3">
		<a href="{{ route('course.lessons.show', [$course->id, $lesson->id]) }}" class="back-to-page"><i class="fas fa-long-arrow-alt-left"></i> Back to lesson</a>
	</div>
	<div class="container d-flex justify-content-center mt-5 mb-5">
		@if($document->type == 'pdf')
			<iframe src="{{ asset($document->file_path) }}" width="100%" height="800px">
			</iframe>
		@elseif($document->type == 'mp4')
			<video controls width="100%" height="800px">
				<source src="{{ asset($document->file_path) }}"
						type="video/mp4">
				Sorry, your browser doesn't support embedded videos.
			</video>
		@elseif($document->type == 'doc' || $document->type == 'docx')
			<iframe width="100%" height="800px" src="{{ asset($document->file_path) . "&embedded=true" }}"></iframe>
		@endif
	</div>

@endsection
