<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';
    protected $fillable = ['user_id', 'nip', 'statpegawai', 'jabatan','nama', 'tempat_lahir', 'tgl_lahir', 'jk', 'alamat'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
