@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('layouts.sidenav')
        @yield('content')
    <div class="col-md-8 col-md-offset-4">
    <h3>tickets</h3>

    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Pasengger Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>KTP / Pasport Number</th>
            <th>Ticket Code</th>
            <th>Action</th>
        </tr>
        @forelse($tickets as $ticket)
            <tr>
                <td class="col-md-1">{{ $loop->iteration }}</td>
                <td class="col-md-4">{{ $ticket->buyer_name }}</td>
                <td class="col-md-4">{{ $ticket->buyer_address }}</td>
                <td class="col-md-4">{{ $ticket->buyer_phone }}</td>
                <td class="col-md-4">{{ $ticket->buyer_ktp_passport }}</td>
                <td class="col-md-4">{{ $ticket->flight_id }}</td>
                <td class="col-md-4"><a href="{{ route('ticket.print', $ticket->id) }}" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> Print </a><br><br>
                
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal-{{ $ticket->id }}"> Delete </button>

                <!-- Modal -->
                <div id="myModal-{{ $ticket->id }}" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete ticket</h4>
                      </div>
                      <div class="modal-body">
                      <form action="{{ route('ticket.delete', $ticket->id) }}" method="POST" id="user-form-{{ $ticket->id }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                        <div class="alert alert-danger" role="alert">
                        
                            <p>Are you sure you want to delete this ticket?</p>
                        
                        </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        
                        <button type="submit" class="btn btn-danger" onclick="$('#user-form-{{ $ticket->id }}').submit()">Delete</button>
                      </div>
                    </div>

                  </div>
                </div>
                </td>
            </tr>
            @empty
            <td>no ticket</td>

        @endforelse
    </table>
      </div>
    </div>
    </div>


@endsection