@extends('layouts.admin.master')

@section('content')

    

<div class="card">
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
      <h4>Users : </h4>
        
        
        <button class="btn btn-success" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#add_user">+ Add User</button>
                    
  
    </div>
    <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add new user</h5>
              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <form action="{{route('users.store')}}" method="POST">
          <div class="modal-body">
           
                @csrf
                <div class="mt-4">
                    <label for="">Full name</label>
                    <input class="form-control" type="text" placeholder="..." name="name" required>
                </div>
                <div class="mt-4">
                    <label for="">email</label>
                    <input class="form-control" type="email" placeholder="..." name="email" required>
                </div>
                <div class="mt-4">
                    <label for="">Password</label>
                    <input class="form-control" type="password" placeholder="..." name="password" autocomplete required>
                </div>
                <div class="mt-4">
                    <label for="">role</label>
                    <input class="form-control" type="text" placeholder="..." name="role">
                </div>
            
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="button" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-dark" type="submit">Save changes</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>user</th>
                        <th>email</th>
                        <th>role name</th>
                        <th>status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>1</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            {{$user->role ?? ''}}
                        </td>
                        <td>
                            @if ($user->status == 0)
                                <span class="badge bg-dark">Not active</span>
                            @else 
                                <span class="badge bg-success">Active</span>
                            
                        @endif
                    </td>
                        <td>
                            
                            <button class="btn btn-xs btn-primary"  data-bs-toggle="modal" data-original-title="test" data-bs-target="#edit-{{$user->id}}"><i class="lni lni-pencil"></i></button>
                           
                           
                            <button class="btn btn-xs btn-danger" data-bs-toggle="modal" data-original-title="test" data-bs-target="#delete-{{$user->id}}"><i class="lni lni-close"></i></button>
                        </td>
                    </tr>


                    <div class="modal fade" id="delete-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit user <span class="badge bg-dark">{{$user->name}}</span></h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                          <form action="{{route('users.delete')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$user->id}}" name="id">
                            <input type="hidden" value="{{$user->name}}" name="name">
                            <h2 class="text text-center mt-4"> <span class="badge bg-danger">Are you sure?</span></h2>

                            <div class="modal-footer">
                              <button class="btn btn-success" type="button" data-bs-dismiss="modal">No</button>
                              <button class="btn btn-danger" type="submit">Delete</button>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>



                    <div class="modal fade" id="edit-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">edit user <span class="badge bg-dark">{{$user->name}}</span></h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                          <form action="{{route('users.update')}}" method="POST">
                            <div class="modal-body">
                                    <input type="hidden" value="{{$user->id}}" name="id">
                                  @csrf
                                  <div class="mt-4">
                                      <label for="">Full name</label>
                                      <input class="form-control" type="text" placeholder="..." name="name" value="{{$user->name}}" required>
                                  </div>
                                  <div class="mt-4">
                                      <label for="">email</label>
                                      <input class="form-control" type="email" placeholder="..." name="email" value="{{$user->email}}" required>
                                  </div>
                                  <div class="mt-4">
                                      <label for="">Password</label>
                                      <input class="form-control" type="password" placeholder="..." name="password">
                                  </div>
                                  <div class="mt-4">
                                      <label for="">role</label>
                                      <input class="form-control" type="text" placeholder="..." value="{{$user->role}}" name="role">
                                  </div>
                                  <div class="mt-4">
                                      <label for="">Status</label>
                                      <select name="status" id="" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Not Active</option>
                                      </select>
                                  </div>
                              
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-success" type="button" data-bs-dismiss="modal">Close</button>
                              <button class="btn btn-dark loader-3" type="submit">Save changes</button>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>
                      
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        {{ $users->links('pagination::bootstrap-4') }}

    </div>
</div>



@endsection