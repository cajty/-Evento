<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;



class statisticsController extends Controller
{

    public function adminStatistic()
    {
        $users = User::where('role_id', 1)->count();
        $organizers = User::where('role_id', 2)->count();
        $events = Event::count();
        $tickets = Ticket::count();
        $reservations = Reservation::count();

        return view('admin.statistics', compact('users', 'organizers', 'events', 'tickets', 'reservations'));
    }

    public function orgaStatistic()
    {
        $events = Event::where('orga_id', Auth::user()->id)->get();
        $eventsCount = $events->count();

        $ticketsCount = 0;
        $reservationsCount = 0;

        foreach ($events as $event) {
            $ticketsCount += $event->tickets->count();
            foreach ($event->tickets as $ticket) {
                $reservationsCount += $ticket->reservations->count();
            }
        }
        return view('organi.statistics', compact('eventsCount', 'ticketsCount', 'reservationsCount'));
    }
}
