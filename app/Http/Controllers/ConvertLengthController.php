<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertLengthController extends Controller
{
    public function __invoke($value, $unit)
    {
        // Valida que el valor sea numérico
        if (!is_numeric($value)) {
            return response()->json(['error' => 'El valor debe ser numérico'], 400);
        }

        // Realiza la conversión de longitud según la unidad proporcionada
        switch (strtolower($unit)) {
            case 'meters':
                $result = $value * 3.28084; // Conversión de metros a pies
                break;
            case 'feet':
                $result = $value / 3.28084; // Conversión de pies a metros
                break;
            default:
                return response()->json(['error' => 'Unidad no reconocida'], 400);
        }

        // Retorna el resultado en formato JSON
        return response()->json(['result' => $result]);

    }
}