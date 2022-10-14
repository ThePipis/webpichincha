<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Inventario_windows;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InventariosExport;

class InventariosController extends Controller
{

    public function index(Request $request)
    {
         $variable2 =  QueryController::$variable;

       /*  $vinfos = DB::connection('sqlsrv2')->table('INV_WINDOWS')->orderBy('Fecha_de_Instalacion','DESC')->where([ */

            /* $vinfos = inventario_windows::select($variable2)->paginate(4); */

          $vinfos = DB::connection('sqlsrv2')->table('inventario_windows')->orderBy('Fecha_de_Instalacion','DESC')->whereRaw($variable2)->where([
            ['Server_Name', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('Server_Name', 'LIKE', '%' . $s . '%')
                        ->orWhere('IP_Primaria', 'LIKE', '%' . $s . '%')
                        ->orWhere('Ambiente', 'LIKE', '%' . $s . '%')
                        ->orWhere('Rol', 'LIKE', '%' . $s . '%')
                        ->orWhere('Funcion', 'LIKE', '%' . $s . '%')
                        ->orWhere('Plataforma', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }]
        ])->paginate(6);
        /*   $vinfos = inventario_windows::all()->paginate(4); */


        /* $vinfos = inventario_windows::all()->paginate(4); */
        return  view('inventarios.index',compact('vinfos'))->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {

    }


    public function show(Request $request,$Server_Name)
    {

         /* $variable2 =  QueryController::$variable;

         $inventario_windows= DB::connection('sqlsrv2')->table('inventario_windows')->orderBy('Fecha_de_Instalacion','DESC')->whereRaw($variable2)->find('Server_Name');

         return view('inventarios.show',compact('inventario_windows')); */

         $variable2 =  QueryController::$variable;

         $inventario_windows= DB::connection('sqlsrv2')->table('inventario_windows')->whereRaw($variable2)->where('Server_Name',$Server_Name)->first();

         return view('inventarios.show',compact('inventario_windows'));

    }

    public function export()
    {
        return Excel::download(new InventariosExport, 'Inventarios.xlsx');
    }

}
