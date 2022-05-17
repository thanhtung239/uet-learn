@extends('layouts.app')
@section('content')
    @if (!empty(Auth::user()) && Auth::user()->id == $course->teacher_id  && Auth::user()->role == '1')
        <a class="appWrapper-Header-primaryButton d-flex align-items-center" href="{{ route('courses.edit', [$course]) }}">
            <svg class="appWrapper-Header-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"><g fill="none" fill-rule="evenodd"><path stroke="#FFBA00" stroke-width=".5" d="M1 1h28v28H1z" opacity=".01"></path><path class="svg-fill" fill="#fff" d="M16.765 2.312a.759.759 0 1 1 0 1.518H6.873a1.88 1.88 0 0 0-1.877 1.877v16.438a1.88 1.88 0 0 0 1.877 1.877H23.31a1.88 1.88 0 0 0 1.877-1.877V11.8a.76.76 0 0 1 1.518 0v10.344a3.399 3.399 0 0 1-3.395 3.395H6.873a3.4 3.4 0 0 1-3.396-3.395V5.707a3.4 3.4 0 0 1 3.396-3.395h9.892zm6.022.21c.273-.1.564-.078.835-.038.276.042.57.205.83.461l.54.54 1.117 1.117c.24.24.394.497.46.766a1.68 1.68 0 0 1-.4 1.545l-.058.062c-.344.352-.7.707-1.048 1.05l-.631.63-6.33 6.328-.488.493-.038.04c-.307.31-.621.628-.939.932-.153.148-.339.219-.619.236l-3.014.184h-.03a.719.719 0 0 1-.484-.218c-.158-.156-.249-.358-.24-.543l.135-3.097c.016-.253.095-.443.248-.598l.157-.16.003-.002.082-.081 5.416-5.415c.576-.577 1.166-1.167 1.747-1.745l1.68-1.682c.144-.146.27-.275.397-.396.188-.181.388-.304.672-.408zm.493 1.428l-.221.219c-.153.151-.306.305-.457.456l-.536.537-8.151 8.152-.086 1.957 1.906-.115.312-.312.226-.224.05-.049.385-.38 8.401-8.403-1.211-1.209a8.233 8.233 0 0 1-.172-.175l-.027-.029c-.065-.068-.13-.137-.2-.206l-.22-.219z"></path></g></svg>
            <span>Edit</span>
        </a>
    @endif
    @include('components.direction', [$course->id])
    <div class="detail-course container-fluid bg-light">
        <div class="container p-0">
            <div class="row">
                <div class="col-md-8 p-0">
                    <img src="{{ asset($course->logo_path) }}" alt="course-logo" class="course-logo">
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
                            <li class="nav-item col-md-2" role="presentation">
                                <a class="nav-link @if (!Session::has('post_review')) active @endif d-flex align-items-center" id="pillsLessonsTab" data-toggle="pill" href="#pillsLessons" role="tab" aria-controls="pills-lessons" aria-selected="true">
                                    <p class="m-0">Lessons</p>
                                </a>
                            </li>
                            <li class="nav-item col-md-2" role="presentation">
                                <a class="nav-link text-center d-flex align-items-center" id="pillsTeacherTab" data-toggle="pill" href="#pillsTeacher" role="tab" aria-controls="pillsTeacher" aria-selected="false">
                                    <p class="m-0">Teachers</p>
                                </a>
                            </li>
                            <li class="nav-item col-md-2" role="presentation">
                                <a class="nav-link @if (Session::has('post_review')) active @endif text-center d-flex align-items-center" id="pillsReviewsTab" data-toggle="pill" href="#pillsReviews" role="tab" aria-controls="pills-reviews" aria-selected="false">
                                    <p class="m-0">Reviews</p>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pillsTabContent">
                            <div class="tab-pane fade @if (!Session::has('post_review')) active show @endif" id="pillsLessons" role="tabpanel" aria-labelledby="pills-lessons-tab">
                                <div class="tab-content-lessons">
                                    <div class="form-search-lesson w-100 d-flex align-items-center">
                                        <div class="input-group col-md-6 d-flex">                                            
                                            <form action="{{route('courses.show', [$course->id])}}" method="GET" class="d-flex">
                                                <div class="form-outline d-flex">
                                                    <input type="text" id="formSearch" name="keyword_lesson" class="form-control form-control-search w-100" placeholder="Search..."/>
                                                    <i class="fas fa-search"></i>
                                                </div>
                                                <button type="submit" class="btn">Search</button>
                                            </form>          
                                        </div>
                                        <div class="col-md-6 d-flex justify-content-center">
                                            @if ((!empty(Auth::user()) && Auth::user()->role == 0) || (empty(Auth::user())))
                                                @if (!empty($course->isJoined))
                                                    <button type="" class="joined-course">Joined</button>  
                                                @else
                                                    <form action="{{ route('course-users.store') }}" method="POST">
                                                        @csrf
                                                        <input class="d-none" type="text" name="course_id" value="{{ $course->id }}">
                                                        <button type="submit" class="btn join-this-course-button" id="joinThisCourseButton">Join this course</button>
                                                    </form>
                                                @endif
                                            @elseif (!empty(Auth::user()) && Auth::user()->role == 1 && Auth::id() == $course->teacher_id)
                                                <form action="{{ route('course.lessons.create', [$course->id]) }}" method="GET">
                                                    <button type="submit" class="btn btn-update button-submit w-auto">
                                                        <svg class="appWrapper-Header-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"><g fill="none" fill-rule="evenodd"><path stroke="#FFBA00" stroke-width=".5" d="M1 1h28v28H1z" opacity=".01"></path><path class="svg-fill" fill="#fff" d="M16.765 2.312a.759.759 0 1 1 0 1.518H6.873a1.88 1.88 0 0 0-1.877 1.877v16.438a1.88 1.88 0 0 0 1.877 1.877H23.31a1.88 1.88 0 0 0 1.877-1.877V11.8a.76.76 0 0 1 1.518 0v10.344a3.399 3.399 0 0 1-3.395 3.395H6.873a3.4 3.4 0 0 1-3.396-3.395V5.707a3.4 3.4 0 0 1 3.396-3.395h9.892zm6.022.21c.273-.1.564-.078.835-.038.276.042.57.205.83.461l.54.54 1.117 1.117c.24.24.394.497.46.766a1.68 1.68 0 0 1-.4 1.545l-.058.062c-.344.352-.7.707-1.048 1.05l-.631.63-6.33 6.328-.488.493-.038.04c-.307.31-.621.628-.939.932-.153.148-.339.219-.619.236l-3.014.184h-.03a.719.719 0 0 1-.484-.218c-.158-.156-.249-.358-.24-.543l.135-3.097c.016-.253.095-.443.248-.598l.157-.16.003-.002.082-.081 5.416-5.415c.576-.577 1.166-1.167 1.747-1.745l1.68-1.682c.144-.146.27-.275.397-.396.188-.181.388-.304.672-.408zm.493 1.428l-.221.219c-.153.151-.306.305-.457.456l-.536.537-8.151 8.152-.086 1.957 1.906-.115.312-.312.226-.224.05-.049.385-.38 8.401-8.403-1.211-1.209a8.233 8.233 0 0 1-.172-.175l-.027-.029c-.065-.068-.13-.137-.2-.206l-.22-.219z"></path></g></svg>
                                                        <span>Create Lesson</span>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="show-list-lessons">
                                        @foreach ($lessons as $key => $lesson)
                                            @include('lessons.lesson', [$key, $lesson])
                                        @endforeach
                                        <div class="pagination-custom container mt-3 pr-4 d-flex justify-content-end">
                                            {!! $lessons->appends($_GET)->links() !!}
                                        </div>
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
                            <div class="tab-pane fade @if (Session::has('post_review')) active show @endif" id="pillsReviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                                @include('reviews.index')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pr-0">
                    <div class="d-flex flex-column">
                        <div class="course-detail-parameters d-flex flex-column">
                            <div class="data learners-data d-flex align-items-center">
                                <i class="fas fa-users"></i>
                                <div class="ml-2 subject">Learners</div>
                                <div class="ml-2">:  {{$course->number_student}}</div>
                            </div>
                            <div class="data lessons-data d-flex align-items-center">
                                <i class="fas fa-file-code"></i>
                                <div class="ml-2 subject">Lessons</div>
                                <div class="ml-2">:  {{$course->number_lesson}} lesson</div>
                            </div>
                            <div class="data times-data d-flex align-items-center">
                                <i class="far fa-clock"></i>
                                <div class="ml-2 subject">Times</div>
                                <div class="ml-2">:  {{$course->total_time}} hours</div>
                            </div>
                            <div class="data tags-data d-flex align-items-center">
                                <i class="fas fa-tags"></i>
                                <div class="ml-2 subject">Tag</div>
                                <div class="ml-2">:</div>
                                <div class="tag-group">
                                    @foreach ($course->tags as $tag)
                                        <form action="{{ route('courses.index') }}" method="GET">
                                            <input type="text" class="d-none" name="tag" value="{{ $tag->id }}">
                                            <button type="submit" class="random-tag-name p-0 mr-1">#{{ $tag->name }}</button>
                                        </form>
                                    @endforeach
{{--                                    @if (!empty(Auth::user()) && Auth::user()->role == 1 && Auth::id() == $course->teacher_id)--}}
{{--                                        <form class="d-flex" action="{{ route('course-tags.store') }}" method="POST">--}}
{{--                                            @csrf--}}
{{--                                            <select class="get-value input-change form-control form-control-custom select-tag d-none text-dark p-0" id="selectTag" name="add_tag" style="width:100%">--}}
{{--                                                <option value="">Tags</option>--}}
{{--                                                @foreach ($allTags as $tag)--}}
{{--                                                    <option value="{{ $tag->id }}" @if ($tag->id == request('tag')) selected @endif>{{ $tag->name }}--}}
{{--                                                    </option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                            <a class="btn btn-update button-submit w-auto" id="addTag">--}}
{{--                                                <span>+</span>--}}
{{--                                            </a>--}}
{{--                                            <input hidden="true" type="number" value="{{ $course->id }}" name="course_id">--}}
{{--                                            <button class="btn btn-update button-submit w-auto d-none" id="summitTag">--}}
{{--                                                <span>Add</span>--}}
{{--                                            </button>--}}
{{--                                        </form>--}}
{{--                                    @endif--}}
                                </div>
                            </div>
                            <div class="data price d-flex align-items-center">
                                <i class="far fa-money-bill-alt"></i>
                                <div class="ml-2 subject">Price</div>
                                <div class="ml-2">:  {{ $course->price }}</div>
                            </div>
                            
                            @if (empty($course->isJoined) == false && Auth::user()->role == '0')
                                <div class="data leave-this-course d-flex justify-content-center align-items-center d-none">
                                    <form action="{{route('course-users.destroy', [$course])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn leave-this-course-button">Leave this course</button>
                                    </form>
                                </div>        
                            @elseif (!empty(Auth::user()) && Auth::user()->role == '1' && Auth::user()->id == $course->teacher_id)
                                <div class="data leave-this-course d-flex justify-content-center align-items-center d-none">
                                    <form action="{{route('courses.destroy', [$course])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn leave-this-course-button">Delete this course</button>
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
