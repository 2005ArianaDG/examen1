@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Comparar Apuestas</h1>
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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tipo de Juego</th>
                    <th scope="col">Dinero Total en las Apuestas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Juegos de Cartas</td>
                    <td>${{ number_format($cartas, 2) }}</td>
                </tr>
                <tr>
                    <td>Otros Juegos no de cartas</td>
                    <td>${{ number_format($noCartas, 2) }}</td>
                </tr>
            </tbody>
        </table>
        <hr>
        <p>El dinero total de las apuestas en juegos de cartas es {{ $resultado }} que el dinero total de las apuestas de juegos que no son de cartas.</p>
    </div>
@endsection
