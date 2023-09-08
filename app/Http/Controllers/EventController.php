<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

use App\Models\User;

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

    public function dashboard(){

        $user = User::findOrFail(auth()->user()->id);

        return view('dashboard', [
            'events' => auth()->user()->events,
            'eventsAsParticipant' => $user->eventsAsParticipant
        ]);
    }

    public function show($id){

        $event = Event::findOrFail($id);
        $userId = auth()->user()->id;

        return view('events.show', [ 
            'event' => $event,
            'eventOwner' => $event->user,
            'isParticipant' => Event::whereHas('users', function ($query) use ($userId) {
                $query->where('users.id', $userId);
            })->where('events.id', $id)->exists()
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

        $event->user_id = auth()->user()->id;

        $event->image =  $this->uploadImage($request, 'image', 'img/events');

        $event->save();
    
        return redirect('/')->with('msg-success', 'Evento criado com sucesso!');
    }

    public function edit($id){
        return view('events.edit', ['event' => Event::findOrFail($id)]);
    }

    public function update(Request $request){

        $data = $request->all();

        $data['image'] = $this->uploadImage($request, 'image', 'img/events');

        Event::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg-success', 'Evento atualizado com sucesso!');
    }

    public function destroy($id){

        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg-success', 'Evento deletado com sucesso!');
    }

    public function joinEvent($id){

        $user = User::findOrFail(auth()->user()->id);
        $userId = $user->id;
        $event = Event::findOrFail($id);

        if(Event::where('id', $id)->where('user_id', $userId)->exists()){

            return back()->with("msg-error", "Você é o dono do evento " . $event->title . "!"); 
              
        }
        else if(Event::whereHas('users', function ($query) use ($userId) {
            $query->where('users.id', $userId);
        })->where('events.id', $id)->exists()){

            return back()->with("msg-error", "Sua presença já estava confirmada no evento " . $event->title . "!");   

        }

        $user->eventsAsParticipant()->attach($id);
        return back()->with("msg-success", "Sua presença está confirmada no evento " . $event->title . "!");
       
    }

    public function leaveEvent($id){
        $user = User::findOrFail(auth()->user()->id);
        $event = Event::findOrFail($id);

        $user->eventsAsParticipant()->detach($id);
        return back()->with("msg-success", "Sua presença no evento " . $event->title . " foi cancelada!");
    }
}
