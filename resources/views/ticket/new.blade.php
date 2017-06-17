@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
    @include('layouts.sidenav')
        @yield('content')
        <div class="col-md-8 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">E-Ticket</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('ticket.create') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone" type="tel" class="form-control input-medium bfh-phone" data-format="+62 (ddd) ddd-dddddddddddddddd" name="phone" required>
                            </div>
                        </div> 
                        
                        <div class="form-group">
                            <label for="ktp" class="col-md-4 control-label">KTP / Passport Number</label>

                            <div class="col-md-6">
                                <input id="ktp" type="number" class="form-control" name="ktp" pattern="[0-9]"/ required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="code" class="col-md-4 control-label">Flight Code</label>

                            <div class="col-md-6">
                                <select id="code" class="form-control" name="code">
                                @foreach($flights as $flight)
                                    <option value="{{ $flight->id }}">{{ $flight->flight_code}} {{ $flight->flight_source }}-{{ $flight->flight_destination }} {{ $flight->departure_time->format('d-m-Y H:i') }}-{{ $flight->arrival_time->format('d-m-Y H:i') }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div> 
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection