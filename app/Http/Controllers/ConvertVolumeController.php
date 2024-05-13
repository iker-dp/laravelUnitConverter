<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertVolumeController extends Controller
{
    public function __invoke($value, $unit)
    {
        // Valida que el valor sea numérico
        if (!is_numeric($value)) {
            return response()->json(['error' => 'El valor debe ser numérico'], 400);
        }

        // Realiza la conversión de volumen según la unidad proporcionada
        switch (strtolower($unit)) {
            case 'liters':
                $result = $value * 0.264172; // Conversión de litros a galones americanos
                break;
            case 'gallons':
                $result = $value / 0.264172; // Conversión de galones americanos a litros
                break;
            default:
                return response()->json(['error' => 'Unidad no reconocida'], 400);
        }

        // Retorna el resultado en formato JSON
        return response()->json(['result' => $result]);
    }
}