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
        'notes',
        'client_timezone',
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
    public function countDown()
    {
        return $this->hasOne(CountDownModel::class, 'id_order', 'id_order');
    }
    public function review()
    {
        return $this->hasOne(ReviewsModel::class, 'id_order', 'id_order');
    }

    public function tracking()
    {
        return $this->hasOne(OrderTrackingModel::class, 'id_order', 'id_order');
    }


}
