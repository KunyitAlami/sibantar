<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonBengkelModel extends Model
{
    use HasFactory;

    // Nama tabel (sesuaikan dengan migration)
    protected $table = 'calon_bengkel'; // kalau typo di migration memang 'calong_bengkel'

    // Primary key
    protected $primaryKey = 'id_calon_bengkel';

    // Mass assignable
    protected $fillable = [
        'username',
        'role',
        'email',
        'password',
        'wa_number',
        'link_gmaps',
        'nama_bengkel',
        'kecamatan',
        'alamat_lengkap',
        'jam_buka',
        'jam_tutup',
        'jam_operasional',
        'penjelasan_bengkel',
        'status',
        'id_user',
    ];

    // Hidden fields (misal password)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casts
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }
}
