<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisuda extends Model
{
    use HasFactory;
    protected $table = 'wisuda';
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'bigint';
    protected $fillable = [
        'nim', 'nama_lengkap', 'ttl', 'jenis_kelamin', 'judul_ta', 'ipk', 'jurusan', 'kehadiran'
    ];
}
