<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('active_status', 0)->paginate(12);
        $categorys = Category::all();
        return view('home', compact('events', 'categorys'));
    }
    public function eventToValidat()
    {
        $events = Event::paginate(12);
        return view('admin.adminEvent', compact('events'));
    }
    public function eventIsValid(Event $event)
    {

        $event->update([
            'active_status' => 1,
        ]);

        $events = Event::orderBy('created_at', 'desc')->paginate(12);

        return view('ajax.eventValidet', compact('events'));
    }


    public function eventOfOrga()
    {
        $events = Event::where('orga_id', Auth::user()->id)->paginate(12);
        return view('home', compact('events'));
    }


    public function create()
    {
        $categorys = Category::all();
        return view('e', compact('categorys'));
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
        $validatedData = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required',
            'places' => 'required|integer',
            'automatic' => 'boolean',
            'catg_id' => 'required|exists:categories,id',
        ]);

        $event->update($validatedData);

        return redirect()->route('events.index')->with('success', 'Event updated successfully');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->back()->with('success', 'Event deleted successfully');
    }


    public function searchEvent($search)
    {
       
        if ($search === "allEvents") {
            $events = Event::where('active_status', 0)->paginate(12);
        } else {
            $events = Event::where('active_status', 0)
                ->where('title', 'like', '%' . $search . '%')->paginate(12);
        }

        return view('ajax.event', compact('events'));
    }

    public function filterEvent($id)
    {
      
        if ($id === "allEvents") {
            $events = Event::where('active_status', 0)->paginate(12);
        } else {
            $events = Event::where('catg_id', $id)->where('active_status', 0)->paginate(12);
      
        }
        return view('ajax.event', compact('events'));
       
    }
}
