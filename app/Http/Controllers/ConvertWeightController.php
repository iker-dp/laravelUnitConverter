<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertWeightController extends Controller
{
    public function __invoke($value, $unit)
    {
        // Valida que el valor sea numérico
        if (!is_numeric($value)) {
            return response()->json(['error' => 'El valor debe ser numérico'], 400);
        }

        // Realiza la conversión de peso según la unidad proporcionada
        switch (strtolower($unit)) {
            case 'kilograms':
                $result = $value * 2.20462; // Conversión de kilogramos a libras
                break;
            case 'pounds':
                $result = $value / 2.20462; // Conversión de libras a kilogramos
                break;
            default:
                return response()->json(['error' => 'Unidad no reconocida'], 400);
        }

        // Retorna el resultado en formato JSON
        return response()->json(['result' => $result]);
    }
}