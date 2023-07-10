<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';
    protected $fillable = ['judul_surat__keluar_id', 'perihal_sk', 'tanggal_surat_keluar', 'file_surat_keluar', 'jenis_surat_keluar'];
    
    public function surat_keluar()
    {
        return $this->belongsTo(SuratSurvei::class, 'judul_surat_keluar_id');
    }

    
}
