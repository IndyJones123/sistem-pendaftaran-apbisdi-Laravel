<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sertifikatkaprodi extends Model
{
    use HasFactory;
    protected $table = 'sertifikatkaprodis';
    protected $fillable = [
       'tglmulai',
       'tglberakhir',
       'id_kaprodi',
       'status',
       'link',
       'link2',
    ];

    public function pt()
    {
        return $this->belongsTo(pt::class, 'id_kaprodi', 'id_user');
    }
    
}
