<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUM extends Model
{
    use HasFactory;

    protected $table = 'data_um';
    protected $fillable = ['nama_data', 'nik', 'nomor_kk', 'alamat', 'bidang_usaha', 'jenis_usaha', 'telepon', 'sku', 'omset', 'aset', 'pemasaran', 'tk', ];
    
    public function data_um()
    {
       return $this->hasOne(data_um::class);
    }
}
