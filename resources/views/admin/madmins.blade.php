@extends('layouts.app')

@section('title', 'Manage admins')

@section('manage-admins', 'c-show')
@section('admins', 'c-active')

@section('content')

    @include('admin.topmenu')
    @include('admin.sidebar')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header fw-bolder">
                        Managers
                    </div>
                    <div class="card-body">

                        @if (Session::has('message'))
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert alert-info alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                        <i class="fa fa-info-circle"></i> {{ Session::get('message') }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (count($errors) > 0)
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert alert-danger alert-dismissable" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                        @foreach ($errors->all() as $error)
                                            <i class="fa fa-warning"></i> {{ $error }}
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (auth('admin')->user()->hasPermissionTo('madmin-create', 'admin'))
                            <div class="row">
                                <div class="col p-4">
                                    <a href="{{ route('addadmin') }}" class="btn btn-primary btn-md mb-2">Add
                                        Admin</a>
                                </div>
                            </div>
                        @endif

                        <div class="mb-5 row">
                            <div class="col p-4">
                                <div class="table-responsive" data-example-id="hoverable-table">
                                    <table id="ShipTable"
                                        class="table table-bordered table-striped table-responsive-sm yajra-datatable">
                                        <thead>
                                            <tr>
                                                <th>USER ID</th>
                                                <th>FIRSTNAME</th>
                                                <th>LASTNAME</th>
                                                <th>EMAIL</th>
                                                <th>PHONE</th>
                                                <th>TYPE</th>
                                                <th>STATUS</th>
                                                <th>ROLE</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($admins as $admin)
                                                <tr>
                                                    <td>{{ $admin->id }}</td>
                                                    <td>{{ $admin->firstName }}</td>
                                                    <td>{{ $admin->lastName }}</td>
                                                    <td>{{ $admin->email }}</td>
                                                    <td>{{ $admin->phone }}</td>
                                                    <td>{{ $admin->type }}</td>
                                                    <td>{{ $admin->acnt_type_active }}</td>
                                                    <td>
                                                        @foreach ($admin->roles as $role)
                                                            {{ $role->name }},
                                                        @endforeach
                                                    </td>
                                                    <td>

                                                        <div class="d-flex justify-content-start">
                                                            <a class="btn btn-secondary btn-sm dropdown-toggle"
                                                                href="#" role="button" id="dropdownMenuLink"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                Actions
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                                                                style="z-index: 999;">
                                                                @if (auth('admin')->user()->hasPermissionTo('madmin-block', 'admin'))
                                                                    @if ($admin->acnt_type_active == null || $admin->acnt_type_active == 'blocked')
                                                                        <a class="m-1 btn btn-primary btn-sm"
                                                                            href="{{ route('adminunblock', $admin->id) }}">Unblock</a>
                                                                    @else
                                                                        <a class="m-1 btn btn-danger btn-sm text-nowrap"
                                                                            href="{{ route('adminublock', $admin->id) }}">Block</a>
                                                                    @endif
                                                                @endif
                                                                <a href="#" data-toggle="modal"
                                                                    data-target="#resetpswdModal{{ $admin->id }}"
                                                                    class="m-1 btn btn-warning btn-sm text-nowrap">Reset
                                                                    Password</a>
                                                                @if (auth('admin')->user()->hasPermissionTo('madmin-delete', 'admin') && auth('admin')->user()->id != $admin->id)
                                                                    <a href="#" data-toggle="modal"
                                                                        data-target="#deleteModal{{ $admin->id }}"
                                                                        class="m-1 btn btn-danger btn-sm">Delete</a>
                                                                @endif
                                                                @if (auth('admin')->user()->hasPermissionTo('madmin-edit', 'admin'))
                                                                    <a href="#" data-toggle="modal"
                                                                        data-target="#edituser{{ $admin->id }}"
                                                                        class="m-1 btn btn-secondary btn-sm">Edit</a>
                                                                @endif
                                                                <a href="#" data-toggle="modal"
                                                                    data-target="#sendmailModal{{ $admin->id }}"
                                                                    class="m-1 btn btn-info btn-sm text-nowrap">Send
                                                                    Email</a>
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>


                                                <!-- Reset user password Modal -->
                                                <div id="resetpswdModal{{ $admin->id }}" class="modal fade"
                                                    role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header ">

                                                                <h4 class="modal-title ">Reset Password</strong></h4>
                                                                <button type="button" class="close "
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <p class="">Are you sure you want to reset password
                                                                    for
                                                                    {{ $admin->firstName }} to <span
                                                                        class="text-primary font-weight-bolder">admin01236</span>
                                                                </p>
                                                                <a class="btn btn-danger"
                                                                    href="{{ route('adminresetadminpass', $admin->id) }}">Reset
                                                                    Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Reset user password Modal -->

                                                <!-- Delete user Modal -->
                                                <div id="deleteModal{{ $admin->id }}" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">

                                                                <h4 class="modal-title ">Delete Manager</strong></h4>
                                                                <button type="button" class="close "
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body p-3">
                                                                <p class="">Are you sure you want to delete
                                                                    {{ $admin->firstName }}</p>
                                                                <a class="btn btn-danger"
                                                                    href="{{ route('deladmin', $admin->id) }}">Yes
                                                                    i'm sure</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Delete user Modal -->

                                                <!-- Edit user Modal -->
                                                <div id="edituser{{ $admin->id }}" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">

                                                                <h4 class="modal-title ">Edit Admin</strong></h4>
                                                                <button type="button" class="close "
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form style="padding:3px;" role="form" method="post"
                                                                    action="{{ route('editadmin', $admin->id) }}">
                                                                    <h5 class=" ">Firstname</h5>
                                                                    <input style="padding:5px;" class="form-control "
                                                                        value="{{ $admin->firstName }}" type="text"
                                                                        name="fname" required><br />
                                                                    <h5 class=" ">Lastname</h5>
                                                                    <input style="padding:5px;" class="form-control "
                                                                        value="{{ $admin->lastName }}" type="text"
                                                                        name="l_name" required><br />
                                                                    <h5 class=" ">Email</h5>
                                                                    <input style="padding:5px;" class="form-control "
                                                                        value="{{ $admin->email }}" type="email"
                                                                        name="email" required><br />
                                                                    <h5 class=" ">Phone Number</h5>
                                                                    <input style="padding:5px;" class="form-control "
                                                                        value="{{ $admin->phone }}" type="text"
                                                                        name="phone" required>
                                                                    <br>
                                                                    <h5 class=" ">Type</h5>
                                                                    <select class="form-control " name="type">
                                                                        <option
                                                                            @if ($admin->type == 'Super Admin') selected @endif
                                                                            value="Super Admin">Super Admin</option>
                                                                        <option
                                                                            @if ($admin->type == 'Admin') selected @endif
                                                                            value="Admin">Admin</option>
                                                                    </select><br>
                                                                    <h5 class=" ">Roles</h5>
                                                                    <select class="form-control" name="roles[]" multiple>
                                                                        @foreach ($roles as $role)
                                                                            <option
                                                                                @if ($admin->hasRole($role)) selected @endif
                                                                                value="{{ $role->id }}">
                                                                                {{ $role->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <br>
                                                                    <input type="hidden" name="_token"
                                                                        value="{{ csrf_token() }}">
                                                                    <input type="hidden" name="user_id"
                                                                        value="{{ $admin->id }}">
                                                                    <input type="submit" class="btn btn-info"
                                                                        value="Update account">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Edit user Modal -->

                                                <!-- send a single user email Modal-->
                                                <div id="sendmailModal{{ $admin->id }}" class="modal fade"
                                                    role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title ">Send Email Message</h4>
                                                                <button type="button" class="close "
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <p class="">This message will be sent to
                                                                    {{ $admin->firstName }}
                                                                    {{ $admin->lastName }} </p>
                                                                <form role="form" method="post"
                                                                    action="{{ route('sendmail', $admin->id) }}">

                                                                    <input type="hidden" name="id"
                                                                        value="{{ $admin->id }}">
                                                                    <textarea class="form-control " name="message " row="3" placeholder="Type your message here" required></textarea><br />

                                                                    <input type="hidden" name="_token"
                                                                        value="{{ csrf_token() }}">
                                                                    <input type="submit" class="btn btn-primary"
                                                                        value="Send">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @empty
                                                <tr>
                                                    <td colspan="10">No data available</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('admin/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('fetchadmin') }}",
                columns: [{
                        data: 'id',
                        name: 'ID'
                    },
                    {
                        data: 'firstName',
                        name: 'Firstname'
                    },
                    {
                        data: 'lastName',
                        name: 'Lastname'
                    },
                    {
                        data: 'email',
                        name: 'Email'
                    },
                    {
                        data: 'phone',
                        name: 'Phome'
                    },
                    {
                        data: 'type',
                        name: 'Type'
                    },
                    {
                        data: 'status',
                        name: 'Status'
                    },
                    {
                        data: 'role',
                        name: 'Role'
                    },
                    {
                        data: 'action',
                        name: 'Action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>
@endsection
