@extends('layouts.main')

@section('title', 'Adicionar Evento')
    
@section('content')

<div class="col-md-6 col-12 offset-md-3">
    <h1>Crie o seu evento!</h1>
    <form action="/evento/salvar" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-2">
            <label for="title">Evento:</label>
            <input id="title" name="title" type="text" class="form-control" placeholder="Título de evento...">
        </div>
        <div class="form-group mb-2">
            <label for="city">Cidade:</label>
            <input  id="city" name="city" type="text" class="form-control" placeholder="Cidade onde ocorrerá o evento...">
        </div>
        <div class="form-group mb-2">
            <label for="date">Data do evento:</label>
            <input id="date" name="date" type="date" class="form-control" placeholder="Data do evento...">
        </div>
        <div class="form-group mb-2">
            <label for="private">O evento é privado:</label>
            <select id="private" name="private" class="form-control" >
                <option value="0">Não</option>
                <option value="1">Sim</option>
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
            <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="Do que se trata o evento? Descreva-o!"></textarea> 
        </div>
        
        <input type="submit" value="Adicionar" class="btn btn-primary">
    </form>
</div>

@endsection
