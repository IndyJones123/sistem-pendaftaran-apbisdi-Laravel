<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pt extends Model
{
    use HasFactory;
    protected $table = 'pts';
    protected $fillable = [
       'namapt',
       'kodept',
       'alamat',
       'nidn',
       'namapengelola',
       'telp',
       'namakaprodi',
       'email',
       'tgldaftar',
       'tglapprove',
       'tglberakhir',
       'berkas1',
       'berkas2',
        'id_biaya',
        'id_user',
        'status',
    ];

    public function sertifikatkaprodi()
    {
        return $this->hasMany(sertifikatkaprodi::class, 'id_kaprodi', 'id_user');
    }

    public function individu()
    {
        return $this->hasMany(individu::class, 'id_user', 'id_pt');
    }
}
