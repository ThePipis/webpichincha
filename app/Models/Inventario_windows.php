<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario_windows extends Model
{
    use HasFactory;

    protected $primaryKey = 'Server_Name';

    public $incrementing = false;

    protected $keyType = 'string';
}
