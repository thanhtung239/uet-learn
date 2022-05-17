@extends('layouts.app')

@section('content')
    <div class="form-create-course mb-4 container bg-white">
        <h1 class="text-info">Edit Course<hr></h1>
        <form action="{{ route('courses.update', [$course]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row m-0 p-0">
                <div class="col-md-6 mt-3 pl-0">
                    <div class="form-group">
                        <label for="courseTitle" class="course-label">Title <span style="color: red;">*</span></label>
                        <input type="text" name="course_title" class="form-control" id="courseTitle" value="{{ $course->title }}" placeholder=""required>
                        @error('course_title')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="form-group">
                        <label for="courseDescription" class="course-label">Description <span style="color: red;">*</span></label>
                        <textarea type="text" name="course_description" rows="3" class="form-control" id="courseDescription" required>{{ $course->description }}</textarea>
                        @error('course_description')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3 pl-0">
                    <div class="form-group">
                        <label class="course-label" for="courseImage">Image <span style="color: red;">*</span></label>
                        <input type="file" name="course_image" class="hidden" id="courseImage" value="{{ asset($course->logo_path) }}">

                        <div class="upload-div">
                            <img src="{{ asset($course->logo_path) }}" alt="img" id="uploadImg" class="upload-img">
                            <label for="courseImage" class="upload-label">
                                Change image
                            </label>
                        </div>
                        @error('course_image')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="form-group">
                        <label for="coursePrices" class="course-label">Price <span style="color: red;">*</span></label>
                        <input type="number" name="course_price" class="form-control" id="coursePrice" value="{{ $course->price }}" placeholder="VND" required>
                        @error('course_price')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-3 pl-0">
                    <div class="form-group d-flex">
                        <label for="courseDescription" class="course-label d-flex mr-2">Tags <span style="color: red;">*</span></label>
                        <select class="get-value input-change form-control form-control-custom select-tag select-2-multiple" id="courseTag" name="course_tag[]" style="width:100%" data-placeholder="" multiple="multiple">
                            <option value="">Tags</option>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->name }}" @if (in_array($tag->name, $selectedTags)) selected @endif>{{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-update button-submit">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection