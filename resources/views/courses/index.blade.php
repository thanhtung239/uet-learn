@extends('layouts.app')

@section('content')
    @if (!empty(Auth::user()) && Auth::user()->role == '1')
        <a class="appWrapper-Header-primaryButton d-flex align-items-center" href="{{route('courses.create')}}">
            <svg class="appWrapper-Header-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"><g fill="none" fill-rule="evenodd"><path stroke="#FFBA00" stroke-width=".5" d="M1 1h28v28H1z" opacity=".01"></path><path class="svg-fill" fill="#fff" d="M16.765 2.312a.759.759 0 1 1 0 1.518H6.873a1.88 1.88 0 0 0-1.877 1.877v16.438a1.88 1.88 0 0 0 1.877 1.877H23.31a1.88 1.88 0 0 0 1.877-1.877V11.8a.76.76 0 0 1 1.518 0v10.344a3.399 3.399 0 0 1-3.395 3.395H6.873a3.4 3.4 0 0 1-3.396-3.395V5.707a3.4 3.4 0 0 1 3.396-3.395h9.892zm6.022.21c.273-.1.564-.078.835-.038.276.042.57.205.83.461l.54.54 1.117 1.117c.24.24.394.497.46.766a1.68 1.68 0 0 1-.4 1.545l-.058.062c-.344.352-.7.707-1.048 1.05l-.631.63-6.33 6.328-.488.493-.038.04c-.307.31-.621.628-.939.932-.153.148-.339.219-.619.236l-3.014.184h-.03a.719.719 0 0 1-.484-.218c-.158-.156-.249-.358-.24-.543l.135-3.097c.016-.253.095-.443.248-.598l.157-.16.003-.002.082-.081 5.416-5.415c.576-.577 1.166-1.167 1.747-1.745l1.68-1.682c.144-.146.27-.275.397-.396.188-.181.388-.304.672-.408zm.493 1.428l-.221.219c-.153.151-.306.305-.457.456l-.536.537-8.151 8.152-.086 1.957 1.906-.115.312-.312.226-.224.05-.049.385-.38 8.401-8.403-1.211-1.209a8.233 8.233 0 0 1-.172-.175l-.027-.029c-.065-.068-.13-.137-.2-.206l-.22-.219z"></path></g></svg>
            <span>Create</span>
        </a>
    @endif
    <div class="all-course-page w-100 d-flex flex-column bg-light">
        <form action="{{ route('courses.index') }}" method="get">
            <div class="container d-flex p-0">
                <div class="filter-form mt-5">
                    <a data-toggle="collapse" href="#filterCollapse" class="filter-button btn"><i class="fas fa-sliders-h"></i> Filter</a> 
                </div>

                <div class="search-form mt-5">
                    <div class="input-group d-flex">
                        <div class="form-outline d-flex">
                            <input type="text" id="formSearch" name="keyword" class="form-control form-control-search w-100" placeholder="Search..."/>
                            <i class="fas fa-search"></i>
                        </div>                   
                        <button type="submit" class="btn">Search</button>
                    </div>
                </div>
            </div>
            
            <div id="filterCollapse" class="filter-collapse panel-collapse collapse container p-0 mt-3">
                <div class="filter-collapse-body">
                    <div class="row container w-100 p-0 mx-auto font-weight-bold text-secondary">
                        <div class="col-xl-1 p-md-0 filter-subtitle">Filter by</div>

                        <div class="col-xl-2 col-lg-4 col-md-6 p-xl-0 newest-oldest-radio" id="newestOldestRadio">
                            <input type="radio" id="radioNewest" name="status"
                                value="{{ config('config.options.newest') }}"
                                {{ request('newest_oldest') == config('config.options.newest') ? 'checked' : '' }}>
                            <label for="radioNewest">Newest</label>

                            <input type="radio" id="radioOldest" name="status"
                                value="{{ config('config.options.oldest') }}"
                                {{ request('newest_oldest') == config('config.options.oldest') ? 'checked' : '' }}>
                            <label for="radioOldest" class="float-lg-right">Oldest</label>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                            <select class="get-value input-change form-control form-control-custom select-teacher  h-100 select-2" id="selectTeacher" name="teacher" style="width:100%">
                                <option value="">Teacher</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" @if ($teacher->id == request('teacher')) selected @endif>{{ $teacher->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xl-3 col-lg-4 form-group">
                            <select class="get-value input-change form-control form-control-custom select-number-of-learner  select-2" id="selectNumberOfLearner"
                                name="number_of_learner" style="width:100%">
                                <option value="">Number of learners</option>
                                <option value="{{ config('config.options.asc') }}" @if (request('number_of_learner') == config('config.options.asc')) selected @endif>Ascending</option>
                                <option value="{{ config('config.options.desc') }}" @if (request('number_of_learner') == config('config.options.desc')) selected @endif>Descending</option>
                            </select>
                        </div>

                        <div class="col-xl-3 col-lg-12 form-group">
                            <select class="get-value input-change form-control form-control-custom select-number-of-lesson  select-2" id="selectNumberOfLesson"
                                name="number_of_lesson" style="width:100%">
                                <option value="">Number of lessons</option>
                                <option value="{{ config('config.options.asc') }}" @if (request('number_of_lesson') == config('config.options.asc')) selected @endif>Ascending</option>
                                <option value="{{ config('config.options.desc') }}" @if (request('number_of_lesson') == config('config.options.desc')) selected @endif>Descending</option>
                            </select>
                        </div>                  
                    </div>

                    <div class="font-weight-bold m-0 text-secondary row">
                        <div class="col-xl-1"></div>
                        <div class="col-xl-2 col-lg-4 pl-xl-0 form-group">
                            <select class="get-value input-change form-control form-control-custom select-learn-time  select-2 " id="selectLearnTime" name="total_time" style="width:100%">
                                <option value="">Total time</option>
                                <option value="{{ config('config.options.asc') }}" @if (request('total_time') == config('config.options.asc')) selected @endif>Ascending</option>
                                <option value="{{ config('config.options.desc') }}" @if (request('total_time') == config('config.options.desc')) selected @endif>Descending</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-4 pl-xl-0 form-group">
                            <select class="get-value input-change form-control form-control-custom select-tag  select-2" id="selectTag" name="tag" style="width:100%">
                                <option value="">Tags</option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" @if ($tag->id == request('tag')) selected @endif>{{ $tag->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xl-2 col-lg-4 pl-xl-0 form-group">
                            <select class="get-value input-change form-control form-control-custom select-review  select-2" id="selectReview" name="review" style="width:100%"
                            >
                                <option value="">Review</option>
                                <option value="{{ config('config.options.asc') }}" @if (request('review') == config('config.options.asc')) selected @endif>Ascending</option>
                                <option value="{{ config('config.options.asc') }}" @if (request('review') == config('config.options.desc')) selected @endif>Descending</option>
                            </select>
                        </div>

                        <div class="col-lg-2 pl-xl-0 mb-2">
                            <div class="reset-filter" id="resetFilter">Reset</div>
                        </div>
                    </div>
                </div>
            </div>        

            <div class="container list-courses p-0">
                <div class="row m-0">
                    @foreach ($courses as $course)
                        @include('courses.course', $course)
                    @endforeach
                </div>
            </div>

            <div class="pagination-custom container mt-5 pr-4 d-flex justify-content-end">
                {!! $courses->appends($_GET)->onEachSide(1)->links() !!}
            </div>
        </form>       
    </div>
@endsection
