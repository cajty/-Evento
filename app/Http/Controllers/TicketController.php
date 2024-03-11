<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
       
        $events = Event::where('orga_id', Auth::user()->id)->get();

       
        
    
        return view('tickets.index', compact('events'));
    }

    public function TicketOfOrg(){
        $tickets = Ticket::where('orga_id',Auth::user()->id)->get();
        return view('tickets.TicketOfOrg', compact('tickets'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'price' => 'required',
            'places_nbr' => 'required',
            'event_id' => 'required',
            'type' => 'required',
        ]);

        Ticket::create($validatedData);
       
        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully');
    }

    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        return view('ajax.ticketupdate', compact('ticket'));
    }


    public function update(Ticket $ticket)
    {
        $validatedData = request()->validate([
            'price' => 'required',
            'places_nbr' => 'required',
            'event_id' => 'required',
            'type' => 'required',
        ]);


        $ticket->update($validatedData);

        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully');
    }
}
