<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sertifikatindividu extends Model
{
    use HasFactory;
    protected $table = 'sertifikatindividus';
    protected $fillable = [
       'tglmulai',
       'tglberakhir',
       'id_individu',
    ];
    
}
