<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\AltasyBaja;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;

class AltasyBajasExport implements FromCollection, WithHeadings
{

    public function collection()
    {
      /*   return AltasyBaja::all(); */



        return AltasyBaja::select("ticket"
        ,"servername"
        ,"ipaddress"
        ,"status"
        ,"created_by"
        ,DB::raw("FORMAT(CONVERT(datetime,created_at,103),'dd/MM/yyyy hh:mm') as created_at_format")
  /*       ,DB::raw("FORMAT(CONVERT(datetime,created_at,103),'hh:mm') as created_at_hour_format") */
        ,DB::raw("FORMAT(CONVERT(datetime,updated_at,103),'dd/MM/yyyy hh:mm') as updated_at_format"))->get();
    /*     ,DB::raw("FORMAT(CONVERT(datetime,updated_at,103),'hh:mm') as updated_at_hour_format") */
    }




    public function headings(): array
    {
        return ["ticket"
        ,"servername"
        ,"ipaddress"
        ,"status"
        ,"created_by"
        ,"created_at"
 /*        ,"created_at_hour" */
        ,"updated_at"];
    /*     ,"updated_at_hour" */
    }
}
