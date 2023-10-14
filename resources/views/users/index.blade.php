@extends('layouts.app')

@section('content')
   <div class="container">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4 style="float: left">Add User</h4>
                    <a href="#" style="float: right" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addUser">
                    <i class="fa fa-plus"></i> add users</a>
                </div> <!-- closing div for card-hearder -->
                    <div class="card-body">
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>@if ($user->is_admin ==1)Admin
                                        @else Cashire
                                    @endif</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editUser{{ $user->id }}"><i class="fa fa-edit"></i>Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUser{{ $user->id }}"><i class="fa fa-trash"></i>Del</a>
                                        </div>
                                    </td>
                                </tr>

<!-- Modal for editing User details -->
<div class="modal right fade" id="editUser{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">edit user</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      
      </div>
      <div class="modal-body">
        <form action="{{route('users.update', $user->id)}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="" value="{{ $user->name }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="" value="{{ $user->email }}" class="form-control">
            </div>
            <!-- <div class="form-group">
                <label for="">Phone</label>
                <input type="text" name="phone" id="" value="{{ $user->phone }}" class="form-control">
            </div> -->
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="" readonly value="{{ $user->password }}"class="form-control">
            </div>
            <!-- <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="confirm_password" id="" class="form-control">
            </div> -->
            <div class="form-group">
                <label for="">Role</label>
                <select name="is_admin" id="" class="form-control">
                    <option value="1" @if ($user->is_admin ==1 ) selected 
                    @endif>Admin</option>
                    <option value="2"@if ($user->is_admin ==2 ) selected 
                    @endif>Cashier</option>
                </select>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Update User</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal for deleting User details -->
<div class="modal right fade" id="deleteUser{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">delete user</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      
      </div>
      <div class="modal-body">
        <form action="{{route('users.destroy', $user->id)}}" method="post">
            @csrf
            @method('delete')
            <p>Are you sure you want to delete this {{ $user->name }} ?</p>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-warning">Delete</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
                                @endforeach
                            </tbody>
                        </table>
                        {{$users->links("pagination::bootstrap-4")}}
                    </div>
            </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                <div class="card-header"><h4>search user</h4></div>
                    <div class="card-body">
                        ........
                    </div>
            </div>
            </div>
        </div>
    </div>
   </div>  

   <!-- Modal for adding new user -->
<div class="modal right fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">add user</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('users.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="text" name="phone" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="confirm_password" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <select name="is_admin" id="" class="form-control">
                    <option value="1">Admin</option>
                    <option value="2">Cashier</option>
                </select>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Save User</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal for editing User details -->
<div class="modal right fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">edit user</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('users.update', 1)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="text" name="phone" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="confirm_password" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <select name="is_admin" id="" class="form-control">
                    <option value="1">Admin</option>
                    <option value="2">Cashier</option>
                </select>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Save User</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<style>
    .modal.right .modal-dialog{
        top:0;
        right:0;
        margin-right:25vh;
    }
    .modal.fade:not(.in).right .modal-dialog{
        -webkit-transform: translate3d(25%, 0, 0);
        transform: translate3d(25%, 0, 0);
    }
</style>
@endsection