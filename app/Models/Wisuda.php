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
        'nim', 'user_id', 'nama_lengkap', 'ttl', 'judul_ta', 'ipk', 'jurusan', 'kehadiran', 'tahun', 'foto', 'orangtua', 'pendamping', 'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
