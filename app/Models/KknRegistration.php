<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KknRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'nim',
        'email',
        'pas_foto',
        'program_studi',
        'fakultas',
        'jenis_kkn',
        'alamat_domisili',
        'tempat_tanggal_lahir',
        'jenis_kelamin',
        'nomor_handphone',
        'ipk',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}