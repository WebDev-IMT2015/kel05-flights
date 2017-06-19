@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
    @include('layouts.sidenav')
        @yield('content')
        <div class="col-md-8 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">New Flight</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('flight.update') }}">
                        {{ csrf_field() }}

                        <input type="hidden" id="id" name="id" value="{{ $flight_edit->id }}">

                        <div class="form-group">
                            <label for="code" class="col-md-4 control-label">Flight Code</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control" name="code" value="{{ $flight_edit->flight_code }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="code" class="col-md-4 control-label">Flight Source</label>

                            <div class="col-md-6">
                                <select id="source" class="form-control" name="source">
                                    <option value="jakarta" @if(isset($flight_edit) && $flight_edit->flight_source == "jakarta") selected @endif>Jakarta</option>
                                    <option value="surabaya" @if(isset($flight_edit) && $flight_edit->flight_source == "surabaya") selected @endif>Surabaya</option>
                                    <option value="palembang" @if(isset($flight_edit) && $flight_edit->flight_source == "palembang") selected @endif>Palembang</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="code" class="col-md-4 control-label">Flight Destination</label>

                            <div class="col-md-6">
                                <select id="destination" class="form-control" name="destination">
                                    <option value="jakarta" @if(isset($flight_edit) && $flight_edit->flight_destination == "jakarta") selected @endif>Jakarta</option>
                                    <option value="surabaya" @if(isset($flight_edit) && $flight_edit->flight_destination == "surabaya") selected @endif>Surabaya</option>
                                    <option value="palembang" @if(isset($flight_edit) && $flight_edit->flight_destination == "palembang") selected @endif>Palembang</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="code" class="col-md-4 control-label">Departure Time</label>

                            <div class='input-group date pad' id='datetimepicker6'>
                                <input type='text' class="form-control" name="departure" value="{{ $flight_edit->departure_time->format('d-m-Y H:i') }}"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                
                        <div class="form-group">
                            <label for="code" class="col-md-4 control-label">Arrival Time</label>

                            <div class='input-group date pad' id='datetimepicker7'>
                                <input type='text' class="form-control" name="arrival" value="{{ $flight_edit->arrival_time->format('d-m-Y H:i') }}"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="capacity" class="col-md-4 control-label">Capacity</label>

                            <div class="col-md-6">
                                <input type="number" value="{{ $flight_edit->capacity }}" min="1" max="900" step="1" class="form-control" name="capacity" required/>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="price" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input type="number" value="{{ $flight_edit->price }}" min="1" max="100000000000000000" step="1" class="form-control" name="price" required/>
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