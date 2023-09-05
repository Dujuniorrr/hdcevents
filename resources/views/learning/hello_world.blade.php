@extends('layouts.main')

@section('title', 'hello World')
    
@section('content')
    <h1>IF</h1>
    @if(10 < 5)
        <h1>Vdd man</h1>
    @elseif(1 > 0)
        <h1>Vdd man 2</h1>
    @endif

    <hr>

    <h1>Printar </h1>
    <h1>Nome: {{ $name }}</h1>

    <hr>

    <h1>For</h1>

    @for ($i = 0; $i < count($list); $i++)
        <h1>Item: {{ $list[$i] }} -- Indíce: {{ $i }}</h1>
    @endfor

    <hr>

    <h1>Foreach</h1>
    @foreach ($list as $item)
        <h1>Item: {{ $item }} -- Indíce: {{ $loop->index }}</h1>
    @endforeach

    <hr>

    <h1>PHP</h1>

    @php
        $name = 'JUsep';
        echo $name;
    @endphp

    {{-- COmentarioooo --}}
@endsection
