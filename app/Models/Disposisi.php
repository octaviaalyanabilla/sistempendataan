<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;

    protected $table = 'disposisi';
    protected $fillable = ['surat_id', 'tipe', 'admin_approval', 'kabid_approval', 'kadin_approval'];
    
    public function disposisi()
    {
       return $this->hasOne(disposisi::class);
    }
}
