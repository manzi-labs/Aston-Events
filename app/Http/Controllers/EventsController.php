<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Storage;

class EventsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show', 'interested');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::orderBy('eventInterest', 'desc')->paginate(10);
        return view('events.index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'eventTitle' => 'required',
            'eventImg' => 'required|image|mimes:jpeg,jpg,png,gif',
            'eventDescription' => 'required',
            'eventCategory' => 'required',
            'eventDate' => 'required',
        ]);

        if($request->hasFile('eventImg')){
            $img = $request->file('eventImg');
            $ext = $img->extension();
            $name = $img->getClientOriginalName();
            $filename = $name.time().'.'.$ext;
            $res = $img->storeAs('public/eventImages', $filename);
            // dd($res);

            $event = new Event;
            $event->user_id = auth()->user()->id;
            $event->eventTitle = $request->input('eventTitle');
            $event->eventDescription = $request->input('eventDescription');
            $event->eventCategory = $request->input('eventCategory');
            $event->eventImg = $filename;
            $event->eventDate = $request->input('eventDate');
            $result = $event->save();

        }

        return redirect('/events')->with('success', 'Event Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $event = Event::find($id);

        return view('events.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $event = Event::find($id);

        if($event->user_id != Auth()->user()->id){
            return redirect('events.index')->with('error', 'Unauthorized UAC');
        }

        return view('events.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [
            'eventTitle' => 'nullable',
            'eventDescription' => 'nullable',
            'eventCategory' => 'nullable',
            'eventImg' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'eventDate' => 'nullable',
        ]);

        $event = Event::find($id);
        $filename = $event->eventImg;
        $eventTitle = $event->eventTitle;
        $eventDescription = $event->eventDescription;
        $eventCategory = $event->eventCategory;
        $eventImg = $event->eventImg;
        $eventDate = $event->eventDate;

        if($request->hasFile('eventImg')){
            
            $img = $request->file('eventImg');
            $ext = $img->extension();
            $name = $img->getClientOriginalName();
            $filename = $name.time().'.'.$ext;
            $res = $img->storeAs('public/eventImages', $filename);
            $eventImg = $filename;
        }

        if($request->filled('eventTitle')){
            $eventTitle = $request->input('eventTitle');
        }

        if($request->filled('eventDescription')){
            $eventDescription = $request->input('eventDescription');
        }

        if($request->filled('eventCategory')){
            $eventCategory = $request->input('eventCategory');
        }

        if($request->filled('eventDate')){
            $eventDate = $request->input('eventDate');
        }

        $event->eventTitle = $eventTitle;
        $event->eventImg = $eventImg;
        $event->eventDescription = $eventDescription;
        $event->eventCategory = $eventCategory; 
        $event->eventDate = $eventDate;
        $result = $event->save();

        if($result){
            return redirect('/events')->with('success', 'Event Updated!');
        }
        else{
            return redirect('/events')->with('error', 'Event Not Updated!');
        }
        
    }

    public function interested(Request $request, $id){
        $event = Event::find($id);
        $event->eventInterest = $event->eventInterest + 1;
        $event->save();

        return redirect('/events/'.$id)->with('success', "interest registered!");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $event = Event::find($id);

        if($event->user_id != Auth()->user()->id){
            return redirect('events.index')->with('error', 'Unauthorized UAC');
        }

        $event->delete();
        return redirect('/events')->with('success', 'Event Deleted!');
    }
}
