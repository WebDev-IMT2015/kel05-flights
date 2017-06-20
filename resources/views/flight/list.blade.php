@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('layouts.sidenav')
        @yield('content')
    <div class="col-md-8 col-md-offset-4">
    <h3>Flights</h3>

    <table class="table">
        <tr>
            <th>No.</th>
            <th>Flight Code</th>
            <th>Flight Source</th>
            <th>Flight Destination</th>
            <th>Departure Time</th>
            <th>Arrival Time</th>
            <th>Capacity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        @foreach($flights as $flight)
            <tr>
                <td class="col-md-1">{{ $loop->iteration }}</td>
                <td class="col-md-4">{{ $flight->flight_code }}</td>
                <td class="col-md-4">{{ ucfirst($flight->flight_source) }}</td>
                <td class="col-md-4">{{ ucfirst($flight->flight_destination) }}</td>
                <td class="col-md-4">{{ $flight->departure_time->format('d-m-Y H:i') }}</td>
                <td class="col-md-4">{{ $flight->arrival_time->format('d-m-Y H:i') }}</td>
                <td class="col-md-4">{{ $flight->capacity }}</td>
                <td class="col-md-4">Rp {{ number_format($flight->price,0,",",".") }},-</td>
                
                <td class="col-md-4"><a href="{{ route('flight.edit', $flight->id) }}" class="btn btn-primary"> Edit </a><br><br>

                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal-{{ $flight->id }}"> Delete </button>

                <!-- Modal -->
                <div id="myModal-{{ $flight->id }}" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete Flight</h4>
                      </div>
                      <div class="modal-body">
                      <form action="{{ route('flight.delete', $flight->id) }}" method="POST" id="user-form-{{ $flight->id }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                        <div class="alert alert-danger" role="alert">
                        
                            <p>Are you sure you want to delete this flight?</p>
                        
                        </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        
                        <button type="submit" class="btn btn-danger" onclick="$('#user-form-{{ $flight->id }}').submit()">Delete</button>
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