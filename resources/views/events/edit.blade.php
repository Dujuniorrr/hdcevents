@extends('layouts.main')

@section('title', 'Editando ' . $event->title )
    
@section('content')

<div class="col-md-6 col-12 offset-md-3">
    <h1>Edite o evento!</h1>
    <div class=" mb-3">
        <img src="/img/events/{{ $event->image }}" class="card-img-top border border-light" alt="..." style="width:100%; height: 170px;">
    </div>
    <form action="/evento/atualizar/{{$event->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <label for="title">Evento:</label>
            <input value="{{ $event->title }}" id="title" name="title" type="text" class="form-control" placeholder="Título de evento...">
        </div>
        <div class="form-group mb-2">
            <label for="city">Cidade:</label>
            <input value="{{ $event->city }}" id="city" name="city" type="text" class="form-control" placeholder="Cidade onde ocorrerá o evento...">
        </div>
        <div class="form-group mb-2">
            <label for="date">Data do evento:</label>
            <input value="{{ $event->date->format('Y-m-d') }}" id="date" name="date" type="date" class="form-control" placeholder="Data do evento...">
        </div>
        <div class="form-group mb-2">
            <label for="private">O evento é privado:</label>
            <select id="private" name="private" class="form-control" >
                <option value="0">Não</option>
                <option value="1" {{ $event->private == 1 ? "selected='selected'" : "" }} >Sim</option>
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="items">Adicione items à Infra-Estrutura:</label>
            <div id="items" class="form-group">
                <input type="checkbox" name="items[]" value="Cadeiras" > Cadeiras
            </div>
            <div id="items" class="form-group">
                <input type="checkbox" name="items[]" value="Palco" > Palco
            </div>
            <div id="items" class="form-group">
                <input type="checkbox" name="items[]" value="Open Food" > Open Food
            </div>
            <div id="items" class="form-group">
                <input type="checkbox" name="items[]" value="Brindes" > Brindes
            </div>
        </div>
        <div class="form-group">
            <label for="image">Imagem do Evento:</label>
            <input type="file" name="image" id="" class="form-control">
        </div>
        <div class="form-group mb-2">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="Do que se trata o evento? Descreva-o!"> {{$event->description}} </textarea> 
        </div>
        
        <input type="submit" value="Adicionar" class="btn btn-primary">
    </form>
</div>

@endsection
