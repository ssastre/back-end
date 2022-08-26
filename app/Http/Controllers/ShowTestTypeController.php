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
        function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
            $numbers = range($min, $max);
            shuffle($numbers);
            return array_slice($numbers, 0, $quantity);
        }
        $cantidad = $request->input('cantidad');

       //Seleccionamos todos los registros de image que tengan el tipo_id indicado
        $images = DB::table('images')
            ->where('tipo_id', '=', 1)
            ->get();

        // selecciono cantidad de ids de imagen 
        //$totalids=$imange->count() lengt;
        $totalids=6;
 

        $randomIds= UniqueRandomNumbersWithinRange(1,$totalids,$cantidad) ;
        //print_r($randomIds);
        $i=0;

        foreach ($images as $rows)
        {
            $id = $rows->id;
            $tipo_id = $rows->tipo_id;
            $path_img_testeo = $rows->path_img_testeo;
            $num_corr = $rows->num_corr;
            $img_testeo = $rows->img_testeo;
            $i=$i+1;
            //$result['Datos del id: '][] = array('id' => $id, 'tipo_id' => $tipo_id, 'path' => $path_img_testeo, 'num_corr' => $num_corr); 
            if (in_array( $id, $randomIds ) ){
                $result[] = array("id" => $id,"path" => $path_img_testeo, "num_corr" => $num_corr, "img_testeo" => $img_testeo); 
            }

        }
        
        return response()->json($result, 201);
  
      } 
  
    }
}
