<?php

namespace App\Http\Controllers;

use App\Models\Apuesta;
use App\Models\Juego;
use Illuminate\Http\Request;

class ControllerApuestas extends Controller
{
    public function index()
    {
        $apuestas = Apuesta::all();
        $juegos = Juego::all(); 
    
        return view('apuestas.index', compact('apuestas', 'juegos'));
    }

    public function jugadores()
    {
        $apuestas = Apuesta::whereHas('juego', function ($query) {
            $query->where('cantidad_jugadores', '>', 3);
        })->get();
        return view('Apuestas.jugadores', compact('apuestas'));
    }
    
    public function check()
    {
        // Obtener el dinero total de las apuestas en juegos de cartas
        $cartas = Apuesta::whereHas('juego', function ($query) {
            $query->where('juego_de_cartas', true);
        })->sum('monto');

        // Obtener el dinero total de las apuestas en juegos que no son de cartas
        $noCartas = Apuesta::whereHas('juego', function ($query) {
            $query->where('juego_de_cartas', false);
        })->sum('monto');

        // Comparar los totales y determinar el resultado
        if ($cartas > $noCartas) {
            $resultado = "mayor";
        } elseif ($cartas < $noCartas) {
            $resultado = "menor";
        } else {
            $resultado = "igual";
        }

        return view('Apuestas.checarDinero', [
            'cartas' => $cartas,
            'noCartas' => $noCartas,
            'resultado' => $resultado
        ]);
    }

    public function buscar(Request $request)
    {
        $request->validate([
            'juego_id' => 'required|exists:juegos,id'
        ]);
        $juego = Juego::findOrFail($request->juego_id);

        $apuestas = Apuesta::where('id_juego', $juego->id)->get();

        return view('Apuestas.buscarApuestas', [
            'juego' => $juego,
            'apuestas' => $apuestas
        ]);
    }


}
