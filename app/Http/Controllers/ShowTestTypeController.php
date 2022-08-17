<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowTestTypeController extends Controller
{
    public function show(Request $request)
    {
        $type = $request->input('type');
        if ($type=== 'oneRecord') {
            $id = $request->input('id');
            $test = 'App\Models\Image'::findOrFail($id);
      
            return response()->json([
                'Datos del Test' => [
                    'id Solicitado' => $id,
                    'resultado' => $test
                ]
            ], 201);
      } elseif ($type === 'allRecords') {
        $tipo_id = $request->input('tipo_id');
        //Seleccionamos todos los registros de image que tengan el tipo_id indicado
        $images = DB::table('images')
            ->where('tipo_id', '=', $tipo_id)
            ->get();
        foreach ($images as $rows)
        {
            $id = $rows->id;
            $tipo_id = $rows->tipo_id;
            $path_img_testeo = $rows->path_img_testeo;
            $num_corr = $rows->num_corr;
            $result['Datos del id: '][] = array('id' => $id, 'tipo_id' => $tipo_id, 'path' => $path_img_testeo, 'num_corr' => $num_corr); 
        }
        //return json_encode($result);
        $result_json = json_encode($result);
        return response()->json([
            'Datos del Test' => [
                'Tipo id Solicitado' => $tipo_id,
                'Cantidad de registros' => $images->count(),              
                'resultado' => $result_json
            ]
        ], 201);


    
      } 


        
    }
}
