<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertSpeedController extends Controller
{
    public function __invoke($value, $unit)
    {
        // Valida que el valor sea numérico
        if (!is_numeric($value)) {
            return response()->json(['error' => 'El valor debe ser numérico'], 400);
        }

        // Realiza la conversión de velocidad según la unidad proporcionada
        switch (strtolower($unit)) {
            case 'kilometers':
                $result = $value * 0.621371; // Conversión de kilómetros por hora a millas por hora
                break;
            case 'miles':
                $result = $value / 0.621371; // Conversión de millas por hora a kilómetros por hora
                break;
            default:
                return response()->json(['error' => 'Unidad no reconocida'], 400);
        }

        // Retorna el resultado en formato JSON
        return response()->json(['result' => $result]);
    }
}