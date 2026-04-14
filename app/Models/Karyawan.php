<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = ['nama', 'posisi'];

    // Relasi ke Gaji
    public function gaji()
    {
        return $this->hasOne(Gaji::class);
    }
}