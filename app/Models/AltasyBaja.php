<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AltasyBaja extends Model
{
    use HasFactory, SoftDeletes;

/*     protected $dates = [
        'fech_create',
    ];

    public function getCreatedFormatAttribute()
    {
        return $this->created_at->format('d/m/Y H:i:s');
    }
    protected $appends = ['created_format']; */


    protected $fillable = [
        'ticket',
        'servername',
        'created_by',
        'created_at',
        'updated_at',
        'ipaddress',
        'status',
        'fech_create'

    ];
}
