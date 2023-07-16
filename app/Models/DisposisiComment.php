<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisposisiComment extends Model
{
    use HasFactory;

    protected $table = 'disposisi_comment';
    protected $fillable = ['disposisi_id', 'comment', 'fase'];
    
    public function disposisi_comment()
    {
       return $this->hasOne(disposisi_comment::class);
    }
}
