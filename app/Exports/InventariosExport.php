<?php

namespace App\Exports;

use App\Models\Inventario;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Http\Controllers\QueryController;



class InventariosExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        $variable2 =  QueryController::$variable;
        return DB::connection('sqlsrv2')->table('inventario_windows')->select("Server_Name"
        ,"Dominio"
        ,"Tipo_Server"
        ,"IP_Primaria"
        ,"Ambiente"
        ,"Datacenter"
        ,"Cluster"
        ,"Network"
        ,"Sistema_Operativo"
        ,"Service_Pack"
        ,"Build_Number"
        ,"Arquitectura"
        ,"Modelo_de_CPU"
        ,"CPUs"
        ,"Sockets"
        ,"Cores_P/S"
        ,"%Minimo_CPU"
        ,"%Maximo_CPU"
        ,"%AVG_CPU"
        ,"Memoria_GB"
        ,"%Minimo_Mem"
        ,"%Maximo_Mem"
        ,"%AVG_Mem"
        ,"#Disco"
        ,"Capacidad_GB"
        ,"Capacidad_Usada_GB"
        ,DB::raw("FORMAT(CONVERT(datetime,Fecha_de_Instalacion,103),'dd/MM/yyyy hh:mm') as Fecha_de_Instalacion")
        ,"Owner"
        ,"Funcion"
        ,"Rol"
        ,"Host"
        ,"Fabricante"
        ,"ID_Del_Modelo"
        ,"Numero_De_Serie"
        ,"Plataforma"
        ,DB::raw("FORMAT(CONVERT(datetime,Fecha_Inicio_Soporte,103),'dd/MM/yyyy') as Fecha_Inicio_Soporte")
        ,DB::raw("FORMAT(CONVERT(datetime,Fecha_Fin_Soporte,103),'dd/MM/yyyy') as Fecha_Fin_Soporte")
        ,DB::raw("FORMAT(CONVERT(datetime,Fecha_Soporte_Extendido,103),'dd/MM/yyyy') as Fecha_Soporte_Extendido")
        ,"SOPORTE_OS_PRINCIPAL"
        ,"SOPORTE_OS_EXTENDIDO"
        ,"UploadMes"
        ,"UploadAno")->whereRaw($variable2)->get();
    }
    public function headings(): array
    {
        return ["Server_Name"
        ,"Dominio"
        ,"Tipo_Server"
        ,"IP_Primaria"
        ,"Ambiente"
        ,"Datacenter"
        ,"Cluster"
        ,"Network"
        ,"Sistema_Operativo"
        ,"Service_Pack"
        ,"Build_Number"
        ,"Arquitectura"
        ,"Modelo_de_CPU"
        ,"CPUs"
        ,"Sockets"
        ,"Cores_P/S"
        ,"%Minimo_CPU"
        ,"%Maximo_CPU"
        ,"%AVG_CPU"
        ,"Memoria_GB"
        ,"%Minimo_Mem"
        ,"%Maximo_Mem"
        ,"%AVG_Mem"
        ,"#Disco"
        ,"Capacidad_GB"
        ,"Capacidad_Usada_GB"
        ,"Fecha_de_Instalacion"
        ,"Owner"
        ,"Funcion"
        ,"Rol"
        ,"Host"
        ,"Fabricante"
        ,"ID_Del_Modelo"
        ,"Numero_De_Serie"
        ,"Plataforma"
        ,"Fecha_Inicio_Soporte"
        ,"Fecha_Fin_Soporte"
        ,"Fecha_Soporte_Extendido"
        ,"SOPORTE_OS_PRINCIPAL"
        ,"SOPORTE_OS_EXTENDIDO"
        ,"UploadMes"
        ,"UploadAno"];
    }
}
