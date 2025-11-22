<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportFromUserModel extends Model
{
    protected $table = 'report_from_user';

    protected $primaryKey = 'id_report_from_user';

    protected $fillable = [
        'id_order',
        'id_bengkel',
        'id_user',
        'deskripsi',
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }

    public function bengkel()
    {
        return $this->belongsTo(BengkelModel::class, 'id_bengkel', 'id_bengkel');
    }

    public function order()
    {
        return $this->belongsTo(OrderModel::class, 'id_order', 'id_order');
    }
}
