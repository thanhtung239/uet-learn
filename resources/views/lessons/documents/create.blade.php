@extends('layouts.app')
@section('content')
    <div class="form-create-course mb-4 container bg-white">
        <h1 class="text-info">Create Document<hr></h1>
        <form action="{{ route('lessons.documents.store', [$lesson]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row m-0 p-0">
                <div class="col-md-6 mt-3 pl-0">
                    <div class="form-group">
                        <label for="documentName" class="course-label">Name:</label>
                        <input type="text" name="document_name" class="form-control" id="documentName" value="" placeholder="" required>
                        @error('document_name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
{{--                <div class="col-md-6 mt-3">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="documentType" class="course-label">Type:</label>--}}
{{--                        <input type="number" name="document_type" class="form-control" id="documentType" value="" required>--}}
{{--                        @error('document_type')--}}
{{--                            <span class="invalid-feedback d-block" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-6 mt-3 pl-0">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="documentImage" class="course-label">Image:</label>--}}
{{--                        <input type="file" name="document_image" id="documentImage">--}}
{{--                        @error('document_image')--}}
{{--                            <span class="invalid-feedback d-block" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-md-6 mt-3 pr-0">
                    <div class="form-group">
                        <label for="documentFile" class="course-label">File:</label>
                        <input type="file" name="document_file" class="form-control" id="documentFile" value="">
                        @error('document_file')
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