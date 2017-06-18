@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('layouts.sidenav')
        @yield('content')
    <div class="col-md-8 col-md-offset-4">
    <h3>Sales Report</h3>
    <h4>Total Earnings : {{ $total_earnings }}</h4>
    <h4>Total Ticket Sales : {{ $total_sales }}</h4>
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Flight Code</th>
            <th>Capacity</th>
            <th>Price</th>
            <th>Ticket Sold</th>
            <th>Earnings</th>
            <th>Full</th>
            <th>Action</th>
        </tr>
        @foreach($flights as $flight)
            <tr>
                <td class="col-md-1">{{ $loop->iteration }}</td>
                <td class="col-md-2">{{ $flight->flight_code }}</td>
                <td class="col-md-2">{{ $flight->capacity }}</td>
                <td class="col-md-4">{{ $flight->price }}</td>
                <td class="col-md-4">{{ $flight->sold }}</td>
                <td class="col-md-4">{{ $flight->earning }}</td>
                <td class="col-md-4">{{ $flight->is_full }}</td>
                <td class="col-md-4"><a href="{{ route('report.detail', $flight->id) }}" class="btn btn-primary"> Detail </a><br><br>
            </tr>
        @endforeach
    </table>
      </div>
    </div>
    </div>


@endsection