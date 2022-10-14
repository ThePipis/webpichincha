<?php

namespace App\Imports;

use App\Models\AltasyBaja;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
class AltasyBajasImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AltasyBaja([
            'ticket'        => $row['ticket'],
            'servername'    => $row['servername'],
            'ipaddress'     => $row['ipaddress'],
            'status'        => $row['status'],
            'created_by'    => $row['created_by'],
     /*        'created_at'    => $row['created_at'],
            'updated_at'    => $row['updated_at'], */
           /*  'password' => Hash::make($row['password']),'password' => Hash::make($row['password']), */


        ]);
    }
}
