<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';
    protected $fillable = ['no_agendask', 'no_suratsk', 'pengirim_sk', 'perihal_sk', 'tgl_sk', 'file_surat_keluar', 'jenis_sk'];
    
    public function surat_keluar()
    {
        return $this->belongsTo(SuratKeluar::class, 'no_agendask');
    }

    
}
