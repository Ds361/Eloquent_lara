<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    protected $fillable = ['karyawan_id', 'gaji'];
    
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}