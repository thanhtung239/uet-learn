@extends('layouts.app')

@section('content')
    <div class="form-create-course mb-4 container bg-white">
        <h1 class="text-info">Edit Lesson<hr></h1>
        <form action="{{ route('course.lessons.update', [$course, $lesson]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row m-0 p-0">
                <div class="col-md-6 mt-3 pl-0">
                    <div class="form-group">
                        <label for="lessonTitle" class="course-label">Title <span style="color: red;">*</span></label>
                        <input type="text" name="lesson_title" class="form-control" id="lessonTitle" value="{{ $lesson->title }}" placeholder="" required>
                        @error('lesson_title')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="form-group">
                        <label for="lessonRequirement" class="course-label">Requirement <span style="color: red;">*</span></label>
                        <input type="number" name="lesson_requirement" class="form-control" id="lessonRequirement" value="{{ $lesson->requirement }}" required>
                        @error('lesson_requirement')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3 pl-0">
                    <div class="form-group">
                        <label for="lessonImage" class="course-label">Image <span style="color: red;">*</span></label>
                        <input type="file" name="lesson_image" class="hidden" id="lessonImage" value="{{ asset($lesson->image) }}">
                        <div class="upload-div">
                            <img src="{{ asset($lesson->image) }}" alt="img" id="uploadImg" class="upload-img">
                            <label for="lessonImage" class="upload-label">
                                Change image
                            </label>
                        </div>
                        @error('lesson_image')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="form-group">
                        <label for="lessonContent" class="course-label">Description <span style="color: red;">*</span></label>
                        <input type="text" name="lesson_description" class="form-control" id="lessonContent" value="{{ $lesson->description }}" required>
                        @error('lesson_description')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3 pl-0">
                    <div class="form-group">
                        <label for="lessonLearnTime" class="course-label">Learn Time <span style="color: red;">*</span></label>
                        <input type="number" name="lesson_learn_time" class="form-control" id="lessonLearnTime" value="{{ $lesson->learn_time }}" required>
                        @error('lesson_learn_time')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-update button-submit">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection