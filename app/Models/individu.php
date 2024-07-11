<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class individu extends Model
{
    use HasFactory;
    protected $table = 'individus';
    protected $fillable = [
       'namadosen',
       'notelp',
       'email',
       'nidn',
       'dokumen1',
       'dokumen2',
       'dokumen3',
       'id_pt',
        'id_biaya',
        'id_user',
        'status',
    ];
    
}
