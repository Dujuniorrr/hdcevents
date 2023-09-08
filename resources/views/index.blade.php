@extends('layouts.main')

@section('title', 'HDC Event')
    
@section('content')

<div id="home-image-container" class="p-3">

    <div class="row h-100">
        
       <div>
        <h1 id="title-search" class="text-center text-light">Busque um evento!</h1>
        <div class="d-flex justify-content-center w-100">
             <form action="/" method="GET" class="col-10 col-md-4"> 
                 <div class="form-group">
                    <div class="d-flex align-items-center">
                        <input type="text" name="busca" value="{{ $search }}" placeholder="Procurar..." id="search-input" class="p-2 w-100 border border-0 rounded-start  text-dark">
                        <button class="btn btn-primary rounded-end"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                    </div>
                 </div>
             </form>
        </div>
       </div>
    </div>

</div>

<div class="mx-4 py-3">
    <h2 class="fw-bold">Próximos Eventos</h2>
    @if (count($events))
    <p>Veja os eventos dos próximos dias... </p>
    <div class="row">
     
        @foreach ($events as $event)
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mt-3">
            <div class="card bg-dark mx-4" style="width: 18rem;">
                <img src="/img/events/{{ $event->image }}" class="card-img-top border border-light" alt="..." style="width:100%; height: 170px;">
                <div class="card-body border border-light">
                    <span class="" style="font-size: small"> {{ date('d/m/Y', strtotime($event->date)) }}</span>
                    <h5 class="card-title fw-bolder"> {{ $event->title }}</h5>
                    <p class="card-text"> {{ substr( $event->description, 0, 50) }} @if(strlen($event->description) > 50) ... @endif
                    </p>
                    <a href="/evento/visualizar/{{ $event->id }}" class="btn btn-primary">Saber mais...</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
      @elseif($search)
        <p>Nenhum resultado foi encontrando para a busca "{{ $search }}"!</p>
        <a href="/" class="btn btn-primary">Ver todos eventos!</a>
      @else
        <p>Não há eventos cadastrados!</p>
      @endif
  
     
</div>

{{-- @foreach ($events as $event)
    {{ $event->title }} -- {{ $event->description }} 
    <br>
@endforeach --}}

@endsection
