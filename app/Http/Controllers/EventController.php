<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::paginate(12);
        return view('home', compact('events'));
    }

    public function create()
    {
        return view('e');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required',
            'places' => 'required|integer',
            'automatic' => 'boolean',
            'catg_id' => 'required|exists:categories,id',
        ]);
        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'places' => $request->places,
            'active_status' => 0,
            'automatic' => $request->automatic,
            'orga_id' => Auth::user()->id,
            'catg_id' => $request->catg_id,
        ]);


        //     $imageName = time().'.'.$request->image->extension();

        //    $image = $request->image->move(public_path('images'), $imageName);

        // dd($image); 


        // if ($request->hasFile('image')) {
        //     $validatedData['image_path'] = $request->file('image')->store('images', 'public');
        // }



      

        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('ajax.eventupdate', compact('event'));
    }

    public function update(Event $event)
    {
        $event = Event::find($event->id);
        $validatedData = $event->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required',
            'places' => 'required|integer',
            'automatic' => 'boolean',
            'catg_id' => 'required|exists:categories,id',
        ]);
        $validatedData->update([
            'title' => $event->title,
            'description' => $event->description,
            'date' => $event->date,
            'location' => $event->location,
            'places' => $event->places,
            'active_status' => $event->active_status,
            'automatic' => $event->automatic,
            'orga_id' => Auth::user()->id,
            'catg_id' => $event->catg_id,
        ]);


        return redirect()->route('events.index')->with('success', 'Event updated successfully');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }
}
