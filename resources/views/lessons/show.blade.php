@extends('layouts.app')
@section('content')
    @if (!empty(Auth::user()) && Auth::user()->id == $course->teacher_id  && Auth::user()->role == '1')
        <a class="appWrapper-Header-primaryButton d-flex align-items-center" href="{{ route('course.lessons.edit', [$course, $lesson]) }}">
            <svg class="appWrapper-Header-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"><g fill="none" fill-rule="evenodd"><path stroke="#FFBA00" stroke-width=".5" d="M1 1h28v28H1z" opacity=".01"></path><path class="svg-fill" fill="#fff" d="M16.765 2.312a.759.759 0 1 1 0 1.518H6.873a1.88 1.88 0 0 0-1.877 1.877v16.438a1.88 1.88 0 0 0 1.877 1.877H23.31a1.88 1.88 0 0 0 1.877-1.877V11.8a.76.76 0 0 1 1.518 0v10.344a3.399 3.399 0 0 1-3.395 3.395H6.873a3.4 3.4 0 0 1-3.396-3.395V5.707a3.4 3.4 0 0 1 3.396-3.395h9.892zm6.022.21c.273-.1.564-.078.835-.038.276.042.57.205.83.461l.54.54 1.117 1.117c.24.24.394.497.46.766a1.68 1.68 0 0 1-.4 1.545l-.058.062c-.344.352-.7.707-1.048 1.05l-.631.63-6.33 6.328-.488.493-.038.04c-.307.31-.621.628-.939.932-.153.148-.339.219-.619.236l-3.014.184h-.03a.719.719 0 0 1-.484-.218c-.158-.156-.249-.358-.24-.543l.135-3.097c.016-.253.095-.443.248-.598l.157-.16.003-.002.082-.081 5.416-5.415c.576-.577 1.166-1.167 1.747-1.745l1.68-1.682c.144-.146.27-.275.397-.396.188-.181.388-.304.672-.408zm.493 1.428l-.221.219c-.153.151-.306.305-.457.456l-.536.537-8.151 8.152-.086 1.957 1.906-.115.312-.312.226-.224.05-.049.385-.38 8.401-8.403-1.211-1.209a8.233 8.233 0 0 1-.172-.175l-.027-.029c-.065-.068-.13-.137-.2-.206l-.22-.219z"></path></g></svg>
            <span>Edit</span>
        </a>
    @endif
    @include('components.direction', [$course->id])
    <div class="detail-course container-fluid bg-light">
        <div class="container p-0">
            <div class="row">
                <div class="col-md-8 p-0">
                    <img src="{{ asset($lesson->image) }}" alt="lesson-logo" class="course-logo">
                </div>
                <div class="col-md-4 pr-0">
                    <div class="descriptions-course">
                        <div class="title-of-descriptions-course">Descriptions course</div>
                        <div class="content-of-descriptions-course"><p>{{ $course->description }}</p></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container p-0 mt-5">
            <div class="row">
                <div class="col-md-8 p-0">
                    <div class="course-detail-content">
                            <!-- Nav tabs -->
                        <ul class="tab-bar nav nav-pills d-flex align-items-center" id="pillsTab" role="tablist">
                            <li class="nav-item col-md-" role="presentation">
                                <a class="nav-link d-flex align-items-center" id="pillsLessonsTab" data-toggle="pill" href="#pillsDescriptions" role="tab" aria-controls="pills-lessons" aria-selected="true">
                                    <p class="m-0">Descriptions</p>
                                </a>
                            </li>
                            <li class="nav-item col-md-3" role="presentation">
                                <a class="nav-link active text-center d-flex align-items-center" id="pillsDocumentsTab" data-toggle="pill" href="#pillsDocuments" role="tab" aria-controls="pills-documents" aria-selected="false">
                                    <p class="m-0">Documents</p>
                                </a>
                            </li>
                            <li class="nav-item col-md-3" role="presentation">
                                <a class="nav-link text-center d-flex align-items-center" id="pillsTeacherTab" data-toggle="pill" href="#pillsTeacher" role="tab" aria-controls="pills-teacher" aria-selected="false">
                                    <p class="m-0">Teachers</p>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pillsTabContent">
                            <div class="tab-pane fade" id="pillsDescriptions" role="tabpanel" aria-labelledby="pills-lessons-tab">
                                <div class="tab-content-descriptions">
                                    <div class="description d-flex flex-column">
                                        <div class="description-title">Descriptions lesson</div>
                                        <div class="description-content">{{ $lesson->description }}</div>
                                    </div>
                                    <div class="requirements d-flex flex-column">
                                        <div class="description-title">Requirements</div>
                                        <div class="description-content">{{ $lesson->requirement }}</div>
                                    </div>
                                    <div class="lesson-tag d-flex">
                                        <div>Tag:</div>
                                        @foreach ($course->tags as $tag)
                                            <div class="ml-2">#</div>
                                            <a href="" class="tag">{{ $tag->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pillsTeacher" role="tabpanel" aria-labelledby="pills-teacher-tab">
                                <div class="main-teacher">
                                    <div class="title">Main Teachers</div>
                                    <div class="list-teacher">
                                        @foreach ($course->teachers as $teacher)
                                            @include('components.teacher', $teacher)
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="pillsDocuments" role="tabpanel" aria-labelledby="pills-documents-tab">
                                <div class="documents">
                                    <div class="title d-flex align-items-center">
                                        <p class="m-0 col-md-6">Documents</p>
                                        <div class="col-md-2"></div>
                                        <div class="progress progress-document col-md-4 p-0 mt-3">
                                            <div id="progressBarDocument" class="progress-bar"
                                            style="width: {{$lesson->progress . '%'}};" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$lesson->progress . '%'}}</div>
                                        </div>
                                    </div>
                                    <div class="show-list-documents d-flex flex-column">
                                        <form action="{{ route('lessons.documents.create', [$lesson]) }}" method="GET">
                                            <button type="submit" class="btn btn-update button-submit w-auto">
                                                <svg class="appWrapper-Header-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"><g fill="none" fill-rule="evenodd"><path stroke="#FFBA00" stroke-width=".5" d="M1 1h28v28H1z" opacity=".01"></path><path class="svg-fill" fill="#fff" d="M16.765 2.312a.759.759 0 1 1 0 1.518H6.873a1.88 1.88 0 0 0-1.877 1.877v16.438a1.88 1.88 0 0 0 1.877 1.877H23.31a1.88 1.88 0 0 0 1.877-1.877V11.8a.76.76 0 0 1 1.518 0v10.344a3.399 3.399 0 0 1-3.395 3.395H6.873a3.4 3.4 0 0 1-3.396-3.395V5.707a3.4 3.4 0 0 1 3.396-3.395h9.892zm6.022.21c.273-.1.564-.078.835-.038.276.042.57.205.83.461l.54.54 1.117 1.117c.24.24.394.497.46.766a1.68 1.68 0 0 1-.4 1.545l-.058.062c-.344.352-.7.707-1.048 1.05l-.631.63-6.33 6.328-.488.493-.038.04c-.307.31-.621.628-.939.932-.153.148-.339.219-.619.236l-3.014.184h-.03a.719.719 0 0 1-.484-.218c-.158-.156-.249-.358-.24-.543l.135-3.097c.016-.253.095-.443.248-.598l.157-.16.003-.002.082-.081 5.416-5.415c.576-.577 1.166-1.167 1.747-1.745l1.68-1.682c.144-.146.27-.275.397-.396.188-.181.388-.304.672-.408zm.493 1.428l-.221.219c-.153.151-.306.305-.457.456l-.536.537-8.151 8.152-.086 1.957 1.906-.115.312-.312.226-.224.05-.049.385-.38 8.401-8.403-1.211-1.209a8.233 8.233 0 0 1-.172-.175l-.027-.029c-.065-.068-.13-.137-.2-.206l-.22-.219z"></path></g></svg>
                                                <span>Add</span>
                                            </button>
                                        </form>
                                        @foreach ($lesson->documents as $document)
                                            <div class="show-document-item">
                                                <div class="row">
                                                    <div class="document-logo col-md-1 pr-0 d-flex justify-content-end">
                                                        <img src="{{ asset($document->logo_path) }}" alt="logo">
                                                    </div>
                                                    <div class="document-type col-md-1 d-flex align-items-center">
                                                        <p class="m-0">{{ $document->type }}</p>
                                                    </div>
                                                    <div class="col-md-8 d-flex align-items-center">
                                                        <a class="document-name" href="{{ route('documents.show', ['id' => $document->id]) }}" target="_self" data-lesson-id="{{ $lesson->id }}" data-document-id="{{ $document->id }}" target="_blank">{{ $document->name }}</a>
                                                    </div>
                                                    <div class="preview col-md-2">
                                                        <a class="preview-button btn h-100" href="{{ route('documents.show', ['id' => $document->id]) }}" target="_self" data-lesson-id="{{ $lesson->id }}" data-document-id="{{ $document->id }}" target="_blank">Preview</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($lessonPreviousId != 0)
                        <a href="{{ route('course.lessons.show', ['course' => $course, 'lesson' => $lessonPreviousId])}}" type="button" class="btn button-submit float-left">❮ Previous</a>
                    @endif
                    @if ($lessonNextId != 0)
                        <a href="{{ route('course.lessons.show', ['course' => $course, 'lesson' => $lessonNextId])}}" type="button" class="d-flex btn button-submit float-right">Next ❯</a>
                    @endif
                </div>
                <div class="col-md-4 pr-0">
                    <div class="d-flex flex-column">
                        <div class="course-detail-parameters d-flex flex-column">
                            <div class="data learners-data d-flex align-items-center">
                                <i class="fas fa-users"></i>
                                <div class="ml-2 subject">Learners</div>
                                <div class="ml-2">:  {{ $course->number_student }}</div>
                            </div>
                            <div class="data lessons-data d-flex align-items-center">
                                <i class="fas fa-file-code"></i>
                                <div class="ml-2 subject">Lessons</div>
                                <div class="ml-2">:  {{ $course->number_lesson }} lesson</div>
                            </div>
                            <div class="data times-data d-flex align-items-center">
                                <i class="far fa-clock"></i>
                                <div class="ml-2 subject">Times</div>
                                <div class="ml-2">:  {{ $course->total_time }} hours</div>
                            </div>
                            <div class="data tags-data d-flex align-items-center">
                                <i class="fas fa-tags"></i>
                                <div class="ml-2 subject">Tag</div>
                                <div class="ml-2">:</div>
                                <div class="tag-group">
                                    @foreach ($course->tags as $tag)
                                        <div class="ml-2">#</div>
                                        <a href="#" class="random-tag-name">{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="data price d-flex align-items-center">
                                <i class="far fa-money-bill-alt"></i>
                                <div class="ml-2 subject">Price</div>
                                <div class="ml-2">:  free</div>
                            </div>
                            
                            @if (empty($course->check_joined_course) == false)
                                <div class="data leave-this-course d-flex justify-content-center align-items-center d-none">
                                    <form action="{{route('courses.leave', [$course])}}" method="GET">
                                        <button type="submit" class="btn leave-this-course-button">Leave this course</button>
                                    </form>
                                </div>
                            @elseif (!empty(Auth::user()) && Auth::user()->id == $course->teacher_id)
                                <div class="data leave-this-course d-flex justify-content-center align-items-center d-none">
                                    <form action="{{route('course.lessons.destroy', [$course, $lesson])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn leave-this-course-button">Delete this lesson</button>
                                    </form>
                                </div>                              
                            @endif                                
                            </div>
                        
                        <div class="other-courses-in-detail">
                            <div class="other-courses-header d-flex justify-content-center align-items-center">
                                <div>Other Courses</div>
                            </div>
                            <div class="other-course-body">
                                <div class="other-course-list mt-2">
                                    @foreach ($course->other_courses as $key => $otherCourse)
                                        <div class="other-course-item d-flex align-items-center">
                                            <a href="{{route('courses.show', ['course' => $otherCourse->id])}}">
                                                {{ $key + 1 }}. {{ $otherCourse->title }}
                                            </a>                                        
                                        </div>                 
                                    @endforeach                                    
                                </div>
                            </div>
                            <div class="other-course-footer d-flex justify-content-center align-items-center">
                                <a href="{{route('courses.index')}}" class="btn view-all-ours-courses">
                                    View all ours courses
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
