<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'tb_pengumuman'; // pastikan nama tabel sesuai dengan database Anda
    protected $fillable = ['judul', 'isi']; // tambahkan atribut yang boleh diisi
}


