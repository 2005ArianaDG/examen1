@extends('layouts.app')

@section('title', 'Crear Apuesta')

@section('content')
    <h1>Crear Apuesta</h1>
    <a href="{{ route('apuestas.index') }}" ><button type="submit" class="btn btn-primary">Volver</button></a>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('apuestas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label" for="id_juego">Juego</label>
            <select name="id_juego" id="id_juego" class="form-control">
                @foreach($juegos as $juego)
                    <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="datetime-local" name="fecha" id="fecha" class="form-control">
        </div>
        <div class="form-group">
            <label for="monto">Monto</label>
            <input type="number" name="monto" id="monto" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('apuestas.index') }}" class="btn btn-secondary">Volver al Listado</a>
    </form>
@endsection
