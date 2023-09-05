<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{

    public function index(){
        $search = request('busca');

        if($search){
            $events = Event::where([
                ['title', 'like', '%' . $search . '%']
            ])->get();
        }
        else{
            $events = Event::all();
        }

        return view('index', [ 'events' => $events, 'search' => $search ] );
    }

    public function show($id){

        return view('events.show', [
            'event' => Event::findOrFail($id)
        ]);
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'private' => 'required',
            'city' => 'required',
            'items' => 'required',
            'date' => 'required',
            'image' => 'required'
        ]);

        $event = new Event;

        $event->title =  $request->title;
        $event->description = $request->description;
        $event->private = $request->private;
        $event->city = $request->city;
        $event->items = $request->items;
        $event->date = $request->date;

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $extension = $request->image->extension();
            $imgName = md5($request->image->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->image->move(public_path("img/events"), $imgName);

            $event->image = $imgName;
        }

        $event->save();
    
        return redirect('/')->with('msg-success', 'Evento criado com sucesso!');
        
    }
}
