<table class="table table-striped table-left">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Salary</th>
            <th>Role</th>
            <th>Date</th>
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
                    <td>{{$key + 1}}</td>
                    <td style="cursor:pointer;" data-toggle="tooltip" data-placement="right" title="Click to view detail" wire:click.prevent="userDetail('{{ $user->id }}  ')">{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->salary}}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->date }}</td>
                    @if(Auth::user()->is_admin)
                        <td><a href="#"  data-toggle="modal" data-target="#editUserModal{{$user->id}}" class="btn btn-primary btn-sm" ><i class="fa fa-edit fa-lg"></i> Edit</a></td>
                        <td><a href="{{ route('deleteuser', ['id' => $user->id]) }}"  onclick="confirm('Are you sure, You want to delete this user?') || event.stopImmediatePropagation(); event.preventDefault(); document.getElementById('formId').submit();" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i> Delete</a></td>
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
                                    <label for="phone">Password</label>
                                    <input type="password" readonly value="{{$user->password}}" name="password" id="password" class="form-control"/>

                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="is_admin" id="role" class="form-control">
                                        <option value="1" @if($user->is_admin == 1) selected @endif>Admin</option>
                                        <option value="2" @if($user->is_admin == 2) selected @endif>Cashire</option>
                                    </select>
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
                    <td>{{$key + 1}}</td>
                    <td style="cursor:pointer;" data-toggle="tooltip" data-placement="right" title="Click to view detail" wire:click.prevent="userDetail('{{ $user->id }}  ')">{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{number_format($user->salary, 2)}}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->date }}</td>
                    @if(Auth::user()->is_admin)
                        <td><a href="#"  data-toggle="modal" data-target="#editUserModal{{$user->id}}" class="btn btn-primary btn-sm" ><i class="fa fa-edit fa-lg"></i> Edit</a></td>
                        <td><a href="{{ route('deleteuser', ['id' => $user->id]) }}"  onclick="confirm('Are you sure, You want to delete this user?') || event.stopImmediatePropagation(); event.preventDefault(); document.getElementById('formId').submit();" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i> Delete</a></td>
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
                                    <label for="image">Salary</label>
                                    <input type="number" readonly value="{{$user->salary}}" name="salary" id="password" class="form-control"/>

                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="Driver" @if($user->role == "Driver") selected @endif>Driver</option>
                                        <option value="Security" @if($user->role == "Security") selected @endif>Security</option>
                                        <option value="Cashire" @if($user->role == "Cashire") selected @endif>Cashire</option>
                                    </select>
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
