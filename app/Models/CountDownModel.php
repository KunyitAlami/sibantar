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
    ];

    public function order()
    {
        return $this->belongsTo(OrderModel::class, 'id_order', 'id_order');
    }
}
