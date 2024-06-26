<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'alamat', 'absensi'];
    protected $table = 'pegawai';
    public $timestamps = false;
}
