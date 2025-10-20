<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kependudukan extends Model
{
    protected $table= 'kependudukan';
    protected $fillable=[
        'nik',
        'nama',
        'alamat',
        'tmpt_lahir',
        'tgl_lahir',
        'Sts_Kawin',
        'Jumlah_Saudara',
        'Jenis_Kelamin',
        'agama',
        'pendidikan',
    ];
}

