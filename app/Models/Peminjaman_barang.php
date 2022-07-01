<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class peminjaman_barang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'peminjaman_barangs';
    protected $fillable = [
        'nama',
        'barang',
        'jabatan',
        'waktu_pinjam',
        'kategori_barang'
    ];

    protected $hidden = [];


}
