<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="manage-account">Manage Users</div>
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
                        <th class="column-title">Name</th>
                        <th class="column-title">Email</th>
                        <th class="column-title">Permission</th>
                        <th class="column-title">Phone</th>
                        <th class="column-title">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                    <label for="checkbox1"></label>
                                </span>
                            </td>
                            <td class="row-content">{{ $user->name }}</td>
                            <td class="row-content">{{ $user->email }}</td>
                            <td class="row-content">{{ $user->role_user }}</td>
                            <td class="row-content">{{ $user->phone_number }}</td>
                            <td class="row-content">
                                <a href="#editUserModal" class="edit btn-user" value="{{ $user->id }}" data-toggle="modal"><i class="faws fas fa-pen" data-toggle="tooltip" data-original-title="Edit"></i></a>
                                <a href="#deleteUserModal" class="delete btn-user" value="{{ $user->id }}" data-toggle="modal"><i class="faws fas fa-trash" data-toggle="tooltip" data-original-title="Delete"></i></a>
                            </td>
                        </tr>

                        <!-- Delete Modal HTML -->
                        <div id="deleteUserModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{route('delete_user')}}" method="POST">
                                        @csrf
                                        <div class="modal-header">						
                                            <div class="modal-title">Delete User</div>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="faws fas fa-times"></i></button>
                                        </div>
                                        <div class="modal-body">					
                                            <div>Are you sure you want to delete these Records?</div>
                                            <div class="text-warning"><small>This action cannot be undone.</small></div>
                                        </div>
                                        <div class="modal-footer">
                                            <input hidden="true" name="username_id" class="value-id">
                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                            <input type="submit" class="btn btn-danger" value="Delete">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Modal HTML -->
                        <div id="addUserModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="" method="POST">
                                        <div class="modal-header">						
                                            <div class="modal-title">Add User</div>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="faws fas fa-times"></i></button>
                                        </div>
                                        <div class="modal-body">					
                                            <div class="form-group register-username">
                                                <label for="username">Username:</label>
                                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}">

                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group ">
                                                <label for="fullname">Full name:</label>
                                                <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}">

                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>	
                                        </div>
                                        <div class="modal-footer">
                                            <input hidden="true" name="username_id" class="value-id">
                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                            <input type="submit" class="btn btn-success" value="Add">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Modal HTML -->
                        <div id="editUserModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{route('edit_user')}}" method="POST">
                                        @csrf
                                        <div class="modal-header">						
                                            <div class="modal-title">Edit User</div>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="faws fas fa-times"></i></button>
                                        </div>S
                                        <div class="modal-body">					
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input name="username_edit" type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input name="email_edit type="email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea name="address_edit" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input name="phone_edit" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <select name="role_edit" required>
                                                    <option value="">Role</option>
                                                    <option value="0">Student</option>
                                                    <option value="1">Teacher</option>
                                                </select>
                                            </div>					
                                        </div>
                                        <div class="modal-footer">
                                            <input hidden="true" name="username_id" class="value-id">
                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                            <input type="submit" class="btn btn-info" value="Save">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
            <div class="clearfix d-flex align-items-end">
                <div class="pagination-custom container mt-5 pr-4 d-flex justify-content-end">
                    {!! $users->appends($_GET)->fragment('pillsStudens')->onEachSide(1)->links() !!}
                </div>
            </div>
        </div>
    </div>        
</div>
