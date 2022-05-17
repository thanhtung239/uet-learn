@extends('layouts.app')

@section('content')
    <div class="form-create-course mb-4 container bg-white">
        <h1 class="text-info">Create Lesson<hr></h1>
        <form action="{{ route('course.lessons.store', [$course->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row m-0 p-0">
                <div class="col-md-6 mt-3 pl-0">
                    <div class="form-group">
                        <label for="lessonTitle" class="course-label">Title <span style="color: red;">*</span></label>
                        <input type="text" name="lesson_title" class="form-control" id="lessonTitle" value="" required>
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
                        <textarea type="number" name="lesson_requirement" rows="3" class="form-control" id="lessonRequirement" value="" required></textarea>
                        @error('lesson_requirement')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3 pl-0">
                    <div class="form-group">
                        <label for="lessonImage" class="d-block course-label">Image <span style="color: red;">*</span></label>
                        <input type="file" name="lesson_image" class="hidden" id="lessonImage">

                        <div class="upload-div">
                            <img src="{{ asset('img/img-default.png') }}" alt="img" id="uploadImg" class="upload-img">
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
                        <textarea rows="3" type="text" name="lesson_description" class="form-control" id="lessonContent" value="" required></textarea>
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

                        <div class="input-group mb-3">
                            <input type="number" name="lesson_learn_time" class="form-control" id="lessonLearnTime" min="0" max="99999" value="" required>
                            <div class="input-group-append">
                                <span class="input-group-text text-dark">hours</span>
                            </div>
                        </div>
                        @error('lesson_learn_time')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-update button-submit">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection