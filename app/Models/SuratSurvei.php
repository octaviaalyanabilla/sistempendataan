<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratsurvei extends Model
{
    use HasFactory;

    protected $table = 'surat_survei';
    protected $fillable = ['judul_surat_id', 'perihal', 'tanggal_surat', 'file_surat', 'jenis_surat'];
    
    public function surat_survei()
    {
        return $this->belongsTo(SuratSurvei::class, 'judul_surat_id');
    }

    
}
