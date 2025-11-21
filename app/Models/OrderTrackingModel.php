<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderTrackingModel extends Model
{
    protected $table = 'order_tracking';
    protected $primaryKey = 'id_order_tracking';

    protected $fillable = [
        'id_order',
        'current_step',
        'finalPrice',
    ];

    public function order()
    {
        return $this->belongsTo(OrderModel::class, 'id_order', 'id_order');
    }
}
