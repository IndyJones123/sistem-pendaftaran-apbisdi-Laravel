<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class biaya extends Model
{
    use HasFactory;
    protected $table = 'biayas';
    protected $fillable = [
       'keterangan',
       'biaya',
       'tahun',
       'status',
    ];
    
}
