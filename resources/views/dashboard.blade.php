@extends('layouts.main')

@section('title', 'Meus Eventos' )
    
@section('content')


<div class="container p-4">
    
    @if (count($events) > 0)

    <h2>Meus Eventos:</h2>

    <div class="table-responsive">
        <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Horário</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr>
                    <td> {{ $event->title }} </td>
                    <td>  {{ date('d/m/Y', strtotime($event->date)) }} </td>
                    <td>Otto</td>
                    <td class="d-flex">
                        <a href="/evento/editar/{{ $event->id }}" class=" text-decoration-none  btn btn-warning mx-1"> <i class="fa fa-pencil text-dark" aria-hidden="true"></i> Editar </a>
                        <form class="mx-1" action="/evento/deletar/{{ $event->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> Deletar </button>
                        </form>
                        <a class="text-light text-decoration-none btn btn-primary mx-1" href="/evento/visualizar/{{ $event->id }}"> <i class="fa fa-eye" aria-hidden="true"></i> Visualizar </a>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
          </table>
    </div>
    @else
        <h2>Você ainda não adicionou nenhum evento!</h2>
    @endif
</div>


<div class="container p-4">
    
    @if ($eventsAsParticipant)

   <h2>Eventos que estou participando:</h2>
   

    <div class="table-responsive">
        <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Horário</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($eventsAsParticipant as $event)
                <tr>
                    <td> {{ $event->title }} </td>
                    <td>  {{ date('d/m/Y', strtotime($event->date)) }} </td>
                    <td>Otto</td>
                    <td class="d-flex">
                        <form class="mx-1" action="/evento/sair/{{ $event->id }}" method="post">
                            @csrf
                            <button class="btn btn-danger"> <i class="fa fa-close" aria-hidden="true"></i> Cancelar presença!</button>
                        </form>
                        <a class="text-light text-decoration-none btn btn-primary mx-1" href="/evento/visualizar/{{ $event->id }}"> <i class="fa fa-eye" aria-hidden="true"></i> Visualizar </a>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
          </table>
    </div>
    
    @else
        <h2>Você ainda não está participando de nenhum evento!</h2>
    @endif
</div>

@endsection
