<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
   
    public function userReservation()
    {
        $reservations = Reservation::where('user_id', Auth::user()->id)->get();
        return view('user.reservation', compact('reservations'));
    }
   
    public function create()
    {
        return view('reservations.create');
    }

    public function validateRsra($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'accepted';
        $reservation->save();

        return null;
    }

    public function deactivateRsra($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'refused';
        $reservation->save();

        return null;
    }
    public function store(Ticket $ticket)
    {
        if ($ticket->places_nbr >= 0) {
            if ($ticket->event->automatic === true) {
                Reservation::create([
                    'ticket_id' => $ticket->id,
                    'user_id' => Auth::user()->id,
                    'status' =>  'accepted',
                ]);
                $ticket->update([
                    'places_nbr' => $ticket->places_nbr - 1,
                ]);
                return redirect()->back()->with('success', 'Event Reservation successfully');
            }
            Reservation::create([
                'ticket_id' => $ticket->id,
                'user_id' => Auth::user()->id,
                'status' =>  'suspended',
            ]);
            $ticket->update([
                'places_nbr' => $ticket->places_nbr - 1,
            ]);
            return redirect()->back()->with('success', 'Event Reservation in prostions');

        }



        return redirect()->back()->with('success', 'Event Reservation failed');
    }


    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    
    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', compact('reservation'));
    }

  
    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update($request->all());
        return redirect()->route('reservations.show', $reservation->id);
    }

  
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index');
    }
}
