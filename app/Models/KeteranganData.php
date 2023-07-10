<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganData extends Model
{
    use HasFactory;

    protected $table = 'keterangan_data';
    protected $fillable = ['nama_keterangan_data'];
    
}
