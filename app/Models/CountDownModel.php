<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountDownModel extends Model
{
    protected $table = 'count_down';
    protected $primaryKey = 'id_count_down';

    protected $fillable = [
        'id_order',
        'status',
        'batas_konfirmasi', 
        'waktu_konfirmasi', 
    ];

    protected $casts = [
        'batas_konfirmasi' => 'datetime',
        'waktu_konfirmasi' => 'datetime',
    ];

    public function order()
    {
        return $this->belongsTo(OrderModel::class, 'id_order', 'id_order');
    }
}