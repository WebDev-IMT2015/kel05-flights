<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\Flight;

class SalesReportController extends Controller
{
    public function index()
    {
    	$sold_flights = DB::table('tickets')
                   ->select('flight_id', DB::raw('count(flight_id) as total'))
                   ->groupBy('flight_id')
                   ->get();
        $flights = new Collection;
        $total_earnings = 0;
        $total_sales = 0;

        foreach ($sold_flights as $sold_flight)
        {
        	$flight = Flight::findOrFail($sold_flight->flight_id);
        	
         	$earning = $flight->price * $sold_flight->total;
         	$total_earnings += $earning;
         	$total_sales += $sold_flight->total;

         	if($sold_flight->total == $flight->capacity)
         	{
         		$flight->setAttribute('is_full', 'Yes');
         	}
         	else
         	{
         		$flight->setAttribute('is_full', 'No');
         	}

         	$flight->setAttribute('earning', $earning);
         	$flight->setAttribute('sold', $sold_flight->total);
         	$flights->push($flight);

        }

        return view('report.list')
        ->with('flights', $flights)
        ->with('total_earnings', $total_earnings)
        ->with('total_sales', $total_sales);
    }

    public function detail($id)
    {
    	$detail_ticket = DB::table('tickets')->where('flight_id', $id)->get();
    	$detail_flight = Flight::findOrFail($id);

    	return view('report.detail')
    	->with('tickets', $detail_ticket)
    	->with('flight', $detail_flight);
    }
}
