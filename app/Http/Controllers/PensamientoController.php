<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pensamiento;

class PensamientoController extends Controller
{

    public function index()
    {
        try {
            $pensamiento = Pensamiento::all();
            return $pensamiento;
        } catch (\Exception $e) {
            return "No se puede ejecutar el proceso {$e->getCode()},{$e->getLine()},{$e->getMessage()}";
        }
    }

    public function store(Request $request)
    {
        try {
            $pensamiento = new Pensamiento();
            $pensamiento->descripcion = $request->descripcion;
            $pensamiento->save();
            return $pensamiento;
        } catch (\Exception $e) {
            return "No se puede ejecutar el proceso {$e->getCode()},{$e->getLine()},{$e->getMessage()}";
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $pensamiento = Pensamiento::find($id);
            $pensamiento->descripcion = $request->descripcion;
            $pensamiento->save();
            return $pensamiento;
        } catch (\Exception $e) {
            return "No se puede ejecutar el proceso {$e->getCode()},{$e->getLine()},{$e->getMessage()}";
        }
    }

    public function destroy($id)
    {
        try {
            $pensamiento = Pensamiento::find($id);
            $pensamiento->delete();
        } catch (\Exception $e) {
            return "No se puede ejecutar el proceso {$e->getCode()},{$e->getLine()},{$e->getMessage()}";
        }
    }
}
