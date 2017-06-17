<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\Flight;

class TicketController extends Controller
{
    public function index()
    {
        $flights_store = new Collection;
        $flights_store_full = new Collection;
        $flights=Flight::all();
        
        $tickets=DB::table('tickets')
                 ->select('flight_id', DB::raw('count(flight_id) as total'))
                 ->groupBy('flight_id')
                 ->get();

        foreach ($flights as $flight) 
        {
            foreach ($tickets as $ticket) 
            {
                if ($flight->id == $ticket->flight_id)
                {
                    if($ticket->total < $flight->capacity)
                    {
                        $flights_store->push($flight);
                    }
                    else if($ticket->total == $flight->capacity)
                    {
                        $flights_store_full->push($flight);
                    }
                }
            }    
        }

        $diffs = $flights->diff($flights_store);
        $diffs = $diffs->diff($flights_store_full);

        foreach ($diffs as $diff)
        {
            $flights_store->push($diff);
        }

        return view('ticket.new')->with('flights', $flights_store);
    }
     
    public function store(Request $request)
    {
    	$ticket = new Ticket;
        $flight = Flight::findOrFail($request->input('code'));
        
        $ticket->buyer_name = $request->input('name');	
        $ticket->buyer_address = $request->input('address');
        $ticket->buyer_phone = $request->input('phone');  
        $ticket->buyer_ktp_passport = $request->input('ktp');

        $flight->tickets()->save($ticket);

        return redirect('home')->with('success', 'berhasil ditambahkan');
    }

    public function display()
    {
        $tickets = Ticket::all();

        return view('ticket.list')->with('tickets', $tickets);
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);

        $ticket->delete();

        return redirect('home')->with('delete', 'berhasil dihapus');
    }
}
