<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowResultController extends Controller
{
    //
    public function show(Request $request)
    {
        $usuario = $request->input('usuario');
        $fecha = $request->input('fecha');

        $results = DB::table('tests')
        ->where('usuario_id', '=', 1)
        ->get();

        foreach ($results as $rows)
        {
            $id = $rows->id;
            $usuario_id = $rows->usuario_id;
            $num_ing = $rows->num_ing;
            $resultado = $rows->resultado;
            //$result['Datos del id: '][] = array('id' => $id, 'tipo_id' => $tipo_id, 'path' => $path_img_testeo, 'num_corr' => $num_corr); 
            $result[] = array("id" => $id, "usuario_id" => $usuario_id, "num_ing" => $num_ing, "resultado" => $resultado); 

        }

        return response()->json($result, 201);
    }
}
