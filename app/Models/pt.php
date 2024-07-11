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
       'berkas3',
        'id_biaya',
        'id_user',
        'status',
    ];
}
