<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvalTestController extends Controller
{
    public function store(Request $request)
    {
        $usuario = $request->input('usuario');
        $num_ing = $request->input('num_ing');
        $image_id = $request->input('imagen_id');
        $fecha = $request->input('fecha');
        $num_ing_int  = (int) $num_ing ;

        //Buscar el num_corr para comparar con el num_ing
 
        $image = DB::table('images')
                ->where('id', '=', $image_id)
                ->get();
         
        foreach ($image as $row)
        {
            $num_corr = $row->num_corr;
        }
                        
        
        $resultado = FALSE;
        if ($num_ing_int === $num_corr ) {
            $resultado = TRUE; 
        }

        $test = new \App\Models\Test;
        $test->usuario_id = $usuario;
        $test->num_ing = $num_ing_int;
        $test->image_id = $image_id;
        $test->resultado = $resultado;
        $test->fecha = $fecha;
        $test->save();



        return response()->json([
            'Test' => [
                'id' => $test->id,
                'num_ing' => $num_ing,
                'num_corr' => $num_corr,
                'resultado' => $resultado,
                'fecha' => $fecha
            ]
        ], 201);
    }
}
