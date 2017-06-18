@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('layouts.sidenav')
        @yield('content')
        <div class="col-md-8 col-md-offset-4">
        <h3>Flight {{ $flight->flight_code }}</h3>
        <h4>From {{ ucfirst($flight->flight_source) }} to {{ ucfirst($flight->flight_destination) }}</h4>
        <h4>Depart at {{ $flight->departure_time->format('d-m-Y H:i') }}</h4>
        <h4>Arrive at{{ $flight->arrival_time->format('d-m-Y H:i') }}</h4>
        <h4>Capacity : {{ $flight->capacity }}</h4>
        <h4>Price : {{ $flight->price }}</h4>

        <table class="table table-bordered">
            <tr>
                <th>No.</th>
                <th>Pasengger Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>KTP / Pasport Number</th>
            </tr>
            @foreach($tickets as $ticket)
                <tr>
                    <td class="col-md-1">{{ $loop->iteration }}</td>
                    <td class="col-md-4">{{ $ticket->buyer_name }}</td>
                    <td class="col-md-4">{{ $ticket->buyer_address }}</td>
                    <td class="col-md-4">{{ $ticket->buyer_phone }}</td>
                    <td class="col-md-4">{{ $ticket->buyer_ktp_passport }}</td>
                </tr>
            @endforeach
        </table>
        </div>
    </div>
</div>


@endsection