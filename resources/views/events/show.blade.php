@extends('layouts.main')

@section('title',  $event->title )
    
@section('content')

<div class="container p-4">
    <div class="col-12 d-md-flex d-block">
        <div class="col-12 col-md-6">
            <img style=" height: 350px;" src="/img/events/{{ $event->image }}" alt="" width="100%" class="rounded-3">
        </div>
        <div class="col-12 col-md-6 d-block d-sm-flex">
            <div class="col-sm-6 mt-3 mt-md-0 ms-md-3">
                <h1>{{ $event->title }}</h1>
                <p> <i class="text-primary fa fa-location-arrow" aria-hidden="true"></i> {{ $event->city }}</p>
                <p> <i class="text-primary fa-solid fa-people-group"></i> {{ count($event->users)}} Participantes</p>
                <p><i  class="text-primary fa fa-star" aria-hidden="true"></i> {{ $eventOwner->name }} </p>
                <p> <i class="text-primary fa fa-calendar" aria-hidden="true"></i>   {{ date('d/m/Y', strtotime($event->date)) }} </p>

                @if ($isParticipant == true)
                <form action="/evento/sair/{{ $event->id }}" method="post">
                    @csrf
                    <button class="btn btn-danger">Cancelar presença!</button>
                </form>
                @else
                <form action="/evento/participar/{{ $event->id }}" method="post">
                    @csrf
                    <button class="btn btn-primary">Confirmar presença!</button>
                </form>
               
                @endif

            </div>
            @if ($event->items)
            <div class="mt-3 col-sm-6">
                <h3>O evento conta com: </h3>
                <ul class="list-group">
                    @foreach ($event->items as $item)
                        <li class="list-group-item"> <i class="fa fa-arrow-circle-right text-primary" aria-hidden="true"></i> {{ $item }} </li>
                    @endforeach
                  </ul>
            </div>
            @endif
        </div>
    </div>
    <div class="col-12 mt-3">
        <h3>Sobre o evento:</h3>
        <p style="overflow-wrap: break-word" >{{ $event->description }}</p>
    </div>
</div>


@endsection
