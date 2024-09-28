<table class="table table-striped table-left">
    <thead>
        <tr>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Salary</th>
            <th>Role</th>
            <th>SSNIT Number</th>
            @if(Auth::user()->is_admin)
                <th>Edit</th>
                <th>Delete</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @if($searchUser)
            @forelse ($searchUser as $key => $user)
                <tr>
                    <td>{{$user->employeeID}}</td>
                    <td style="cursor:pointer;" data-toggle="tooltip" data-placement="right" title="Click to view detail" wire:click.prevent="userDetail('{{ $user->id }}  ')">{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->salary}}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->ssnit_number }}</td>
                    @if(Auth::user()->is_admin)
                        <td><a href="#"  data-toggle="modal" data-target="#editUserModal{{$user->id}}" class="btn btn-primary btn-sm" ><i class="fa fa-edit fa-lg"></i></a></td>
                        <td><a href="{{ route('deleteuser', ['id' => $user->id]) }}"  onclick="confirm('Are you sure, You want to delete this user?') || event.stopImmediatePropagation(); event.preventDefault(); document.getElementById('formId').submit();" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></a></td>
                        <form action="{{route('deleteuser', ['id' => $user->id])}}" id="formId" style="display: none;" method="POST">
                            @csrf
                        </form>
                    @endif
                </tr>

                <!-- Modal -->
                <div class="modal right fade" id="editUserModal{{$user->id}}" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="addUserModalLabel">Edit Employee</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('edituser', ['id'=>$user->id])}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Employee ID</label>
                                    <input type="text" value="{{$user->employeeID}}" name="employeeID" id="emp_id" class="form-control"/>

                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" value="{{$user->name}}" name="name" id="name" class="form-control"/>

                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" value="{{$user->email}}" name="email" id="email" class="form-control"/>

                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" value="{{$user->phone}}" name="phone" id="phone" class="form-control"/>

                                </div>
                                <div class="form-group">
                                    <label for="salary">Salary</label>
                                    <input type="number" value="{{$user->salary}}" name="salary" id="salary" class="form-control"/>

                                </div>
                                <div class="form-group">
                                    <label for="ssnit_number">SSNIT Number</label>
                                    <input type="text" value="{{$user->ssnit_number}}" name="ssnit_number" id="ssnit_number" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <input type="text" value="{{$user->role}}" name="role" id="role" class="form-control"/>
                                </div>
                                <div class="modal-fotter">
                                    <button class="btn btn-block btn-primary" type="submit">Edit Employee</button>
                                    <button class="btn btn-block btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            @empty
                <tr>
                    <td colspan="7"><h5 class="text-center text-danger">Search result not found!</h5></td>
                </tr>
            @endforelse
        @else
            @foreach ($users as $key => $user)
                <tr>
                    <td>{{$user->employeeID}}</td>
                    <td style="cursor:pointer;" data-toggle="tooltip" data-placement="right" title="Click to view detail" wire:click.prevent="userDetail('{{ $user->id }}  ')">{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{number_format($user->salary, 2)}}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->ssnit_number }}</td>
                    @if(Auth::user()->is_admin)
                        <td><a href="#"  data-toggle="modal" data-target="#editUserModal{{$user->id}}" class="btn btn-primary btn-sm" ><i class="fa fa-edit fa-lg"></i></a></td>
                        <td><a href="{{ route('deleteuser', ['id' => $user->id]) }}"  onclick="confirm('Are you sure, You want to delete this user?') || event.stopImmediatePropagation(); event.preventDefault(); document.getElementById('formId').submit();" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></a></td>
                        <form action="{{route('deleteuser', ['id' => $user->id])}}" id="formId" style="display: none;" method="POST">
                            @csrf
                        </form>
                    @endif
                </tr>
                <!-- Modal -->
                <div class="modal right fade" id="editUserModal{{$user->id}}" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="addUserModalLabel">Edit Employee</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('edituser', ['id'=>$user->id])}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Employee ID</label>
                                    <input type="text" name="employeeID" value="{{$user->employeeID}}" id="emp_id" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" value="{{$user->name}}" name="name" id="name" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" value="{{$user->email}}" name="email" id="email" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" value="{{$user->phone}}" name="phone" id="phone" class="form-control"/>

                                </div>
                                <div class="form-group">
                                    <label for="salary">Salary</label>
                                    <input type="number" value="{{$user->salary}}" name="salary" id="salary" class="form-control"/>

                                </div>
                                <div class="form-group">
                                    <label for="ssnit_number">SSNIT Number</label>
                                    <input type="text" value="{{$user->ssnit_number}}" name="ssnit_number" id="ssnit_number" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <input type="text" value="{{$user->role}}" name="role" id="role" class="form-control"/>
                                </div>
                                <div class="modal-fotter">
                                    <button class="btn btn-block btn-primary" type="submit">Edit Employee</button>
                                    <button class="btn btn-block btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </tbody>
    {{$users->links("pagination::bootstrap-4")}}
</table>
