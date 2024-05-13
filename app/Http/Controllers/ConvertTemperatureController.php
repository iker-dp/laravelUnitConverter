<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertTemperatureController extends Controller
{
    public function __invoke($value, $unit)
    {
        // Valida que el valor sea numérico
        if (!is_numeric($value)) {
            return response()->json(['error' => 'El valor debe ser numérico'], 400);
        }

        // Realiza la conversión de temperatura según la unidad proporcionada
        switch (strtolower($unit)) {
            case 'celsius':
                $result = ($value * 9 / 5) + 32; // Conversión de Celsius a Fahrenheit
                break;
            case 'fahrenheit':
                $result = ($value - 32) * 5 / 9; // Conversión de Fahrenheit a Celsius
                break;
            default:
                return response()->json(['error' => 'Unidad no reconocida'], 400);
        }

        // Retorna el resultado en formato JSON
        return response()->json(['result' => $result]);
    }
}