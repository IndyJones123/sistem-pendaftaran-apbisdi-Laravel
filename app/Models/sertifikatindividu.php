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
       'status',
       'link',
    ];
    
    public function individu()
    {
        return $this->belongsTo(Individu::class, 'id_individu', 'id_user');
    }
}
