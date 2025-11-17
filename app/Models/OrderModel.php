<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderModel extends Model
{
    protected $table = 'order';

    protected $primaryKey = 'id_order';

    protected $fillable = [
        'id_user',
        'id_bengkel',
        'id_layanan_bengkel',
        'user_latitude',
        'user_longitude',
        'bengkel_latitude',
        'bengkel_longitude',
        'status',
        'estimasi_harga',
        'total_bayar',
        'notes'
    ];

    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }

    public function bengkel()
    {
        return $this->belongsTo(BengkelModel::class, 'id_bengkel', 'id_bengkel');
    }

    public function layananBengkel()
    {
        return $this->belongsTo(LayananBengkelModel::class, 'id_layanan_bengkel', 'id_layanan_bengkel');
    }
}
