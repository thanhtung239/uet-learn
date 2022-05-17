<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="manage-account">Manage Courses</div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        <th class="column-title">ID</th>
                        <th class="column-title">Title</th>
                        <th class="column-title">Created By</th>
                        <th class="column-title">Approval</th>
                        <th class="column-title">Price</th>
                        <th class="column-title">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                    <label for="checkbox1"></label>
                                </span>
                            </td>
                            <td class="row-content">{{ $course->id}}</td>
                            <td class="row-content">{{ $course->title}}</td>
                            <td class="row-content">{{ $course->teacher_name }}</td>
                            <td class="row-content">
                                <!-- <form method="post" action="{{ route('approve_course', ['id' => $course])}}">
                                    @csrf -->
                                    <button class="btn-approve badge float-none {{ $course->approval_status == 'approved' ? 'bg-gradient-success' : ''}}" type="submit" value="{{$course->id}}">{{ $course->approval_status }}</button>
                                <!-- </form> -->
                            </td>
                            <td class="row-content">{{ $course->teacher_phone }}</td>
                            <td class="row-content ml-auto">
                                <!-- <a href="#editCourseModal" class="edit btn-course" value="{{ $course->id }}" data-toggle="modal"><i class="faws fas fa-pen" data-toggle="tooltip" data-original-title="Edit"></i></a> -->
                                <a href="#deleteCourseModal" class="delete btn-course" value="{{ $course->id }}" data-toggle="modal"><i class="faws fas fa-trash" data-toggle="tooltip" data-original-title="Delete"></i></a>
                            </td>
                        </tr>
                        <!-- Edit Modal HTML -->
                    @endforeach
                </tbody>
            </table>
            <div class="clearfix d-flex align-items-end">
                <div class="pagination-custom container mt-5 pr-4 d-flex justify-content-end">
                    {!! $courses->appends($_GET)->fragment('pillsCourse')->onEachSide(1)->links() !!}
                </div>
            </div>
        </div>
    </div>    
    <!-- Delete Modal HTML -->
    <div id="deleteCourseModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('delete_course')}}" method="POST">
                    @csrf
                    <div class="modal-header">						
                        <div class="modal-title">Delete Course</div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="faws fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">					
                        <div>Are you sure you want to delete these Records?</div>
                        <div class="text-warning"><small>This action cannot be undone.</small></div>
                    </div>
                    <div class="modal-footer">
                        <input hidden="true" name="course_id" class="value-id">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>
