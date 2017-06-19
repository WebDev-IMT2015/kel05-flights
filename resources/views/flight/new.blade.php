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
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('flight.create') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="code" class="col-md-4 control-label">Flight Code</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control" name="code" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="code" class="col-md-4 control-label">Flight Source</label>

                            <div class="col-md-6">
                                <select id="source" class="form-control" name="source">
                                    <option value="jakarta">Jakarta</option>
                                    <option value="surabaya">Surabaya</option>
                                    <option value="palembang">Palembang</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="code" class="col-md-4 control-label">Flight Destination</label>

                            <div class="col-md-6">
                                <select id="destination" class="form-control" name="destination">
                                    <option value="jakarta">Jakarta</option>
                                    <option value="surabaya">Surabaya</option>
                                    <option value="palembang">Palembang</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="code" class="col-md-4 control-label">Departure Time</label>

                            <div class='col-md-6 input-group date' id='datetimepicker6'>
                                <input type='text' class="form-control" name="departure" required/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                
                        <div class="form-group">
                            <label for="code" class="col-md-4 control-label">Arrival Time</label>

                            <div class='col-md-6 input-group date' id='datetimepicker7'>
                                <input type='text' class="form-control" name="arrival" required/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
    


                        
                        <div class="form-group">
                            <label for="capacity" class="col-md-4 control-label">Capacity</label>

                            <div class="col-md-6">
                                <input type="number" value="10" min="1" max="900" step="1" class="form-control" name="capacity" required/>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="price" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input type="number" value="100000" min="1" max="100000000000000000" step="1" class="form-control" name="price" required/>
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