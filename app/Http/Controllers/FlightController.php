<?php

namespace App\Http\Controllers;

use App\Flight;
use Illuminate\Http\Request;
use DateTime;

class FlightController extends Controller
{
    public function __construct()
    {
          $this->middleware('role:admin');
    }

    public function index()
    {
        $flights=Flight::all();
        return view('flight.list')->with('flights', $flights);
    }

    public function showNewFlightForm()
    {
        return view('flight.new');
    }
     
    public function store(Request $request)
    {
    	//check total flight
    	$check_flights = Flight::all();
    	$check_departure = DateTime::createFromFormat('d-m-Y H:i', $request->input('departure'))->format('Y-m-d');
    	$cnt_departure=0;
    	foreach ($check_flights as $chk) 
        {
            $other_departure = new DateTime($chk->departure_time);
            $oth_dpt = $other_departure->format('Y-m-d');
            if($check_departure == $oth_dpt){
            	$cnt_departure++;
            }
        }

        if($cnt_departure == 4)
        {
        	return redirect('home')->with('failed', 'tidak bisa lebih dari 4');
        }
        else
        {
        	$flight = new Flight;

	    	$departure_time = DateTime::createFromFormat('d-m-Y H:i', $request->input('departure'))->format('Y-m-d H:i');
            $departure_time .= ':00';
	    	
            $arrival_time = DateTime::createFromFormat('d-m-Y H:i', $request->input('arrival'))->format('Y-m-d H:i');
            $arrival_time .= ':00'; 

	    	$flight->flight_code = $request->input('code');
	    	$flight->flight_source = $request->input('source');
	    	$flight->flight_destination = $request->input('destination');
	    	$flight->capacity = $request->input('capacity');
	    	$flight->departure_time = $departure_time;
	    	$flight->arrival_time = $arrival_time;
	    	$flight->price = $request->input('price');
	    	$flight->save();
	    	
	    	return redirect('home')->with('success', 'berhasil ditambahkan');
        }    	
    }

    public function edit($id)
    {
        $flight_edit = Flight::find($id);                        

        return view('flight.edit')->with('flight_edit', $flight_edit);
    }

    public function update(Request $request)
    {
        $flight = Flight::find($request->input('id')); 

        $departure_time = DateTime::createFromFormat('d-m-Y H:i', $request->input('departure'))->format('Y-m-d H:i');
        $departure_time .= ':00'; 
       
        $arrival_time = DateTime::createFromFormat('d-m-Y H:i', $request->input('arrival'))->format('Y-m-d H:i');
        $arrival_time .= ':00';  

        $flight->flight_code = $request->input('code');
        $flight->flight_source = $request->input('source');
        $flight->flight_destination = $request->input('destination');
        $flight->capacity = $request->input('capacity');
        $flight->departure_time = $departure_time;
        $flight->arrival_time = $arrival_time;
        $flight->price = $request->input('price');
        
        $flight->save();

        return redirect('home')->with('update', 'berhasil diubah');
    }

    public function destroy($id)
    {
        $flight = Flight::findOrFail($id);

        $flight->delete();

        return redirect('home')->with('delete', 'berhasil dihapus');
    }
}
