@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Apuestas</h1>
        <a href="{{ route('apuestas.create') }}" class="btn btn-primary">Crear Apuesta</a>
        <a href="{{ route('apuestas.check') }}" class="btn btn-primary">Checar Dinero</a>
        <a href="{{ route('apuestas.buscar') }}" class="btn btn-primary">Buscar</a>

        <div class="mt-3">
            <label for="juego_id">Seleccione un juego: </label>
            <select name="juego_id" id="juego_id" class="form-control">
                <option value="">Todos los juegos</option>
                @foreach($juegos as $juego)
                    <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div id="apuestasResultado" class="mt-3">

            <table id="tablaApuestas" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Juego</th>
                        <th>Fecha</th>
                        <th>Monto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($apuestas as $apuesta)
                        <tr class="apuestaRow" data-juego="{{ $apuesta->id_juego }}">
                            <td>{{ $apuesta->id }}</td>
                            <td>{{ $apuesta->juego->nombre }}</td>
                            <td>{{ $apuesta->fecha }}</td>
                            <td>{{ $apuesta->monto }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#juego_id').change(function() {
                var juego_id = $(this).val();

                if (juego_id === '') {
                    $('.apuestaRow').show();
                } else {
                    $('.apuestaRow').hide();
                    $('.apuestaRow[data-juego="' + juego_id + '"]').show();
                }
            });
        });
    </script>
@endsection
