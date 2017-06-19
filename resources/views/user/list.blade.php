@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('layouts.sidenav')
                        @yield('content')
    <div class="col-md-8 col-md-offset-4">
    <h3>Users</h3>

    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Roles</th>
            <th>Action</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td class="col-md-1">{{ $loop->iteration }}</td>
                <td class="col-md-4">{{ $user->name }}</td>
                <td class="col-md-4">
                    @foreach($user->roles as $role)
                        {{ $role->display_name }}
                    @endforeach

                </td>
                <td class="col-md-4"><a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary"> Edit </a><br><br>

                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal-{{ $user->id }}"> Delete </button>

                <!-- Modal -->
                <div id="myModal-{{ $user->id }}" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete Account</h4>
                      </div>
                      <div class="modal-body">
                      <form action="{{ route('user.delete', $user->id) }}" method="POST" id="user-form-{{ $user->id }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                        <div class="alert alert-danger" role="alert">
                        
                            <p>Are you sure you want to delete this account?</p>
                        
                        </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        
                        <button type="submit" class="btn btn-danger" onclick="$('#user-form-{{ $user->id }}').submit()">Delete</button>
                      </div>
                    </div>

                  </div>
                </div>
            </tr>
        @endforeach
    </table>
      </div>
    </div>
    </div>
@endsection