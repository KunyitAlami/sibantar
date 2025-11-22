<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewsModel extends Model
{

    protected $table = 'reviews';

    protected $primaryKey = 'id_rating';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_order',
        'id_user',
        'id_bengkel',
        'ratingBengkel',
        'ratingLayanan',
        'comment',
    ];

    public function order()
    {
        return $this->belongsTo(OrderModel::class, 'id_order', 'id_order');
    }

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }

    public function bengkel()
    {
        return $this->belongsTo(BengkelModel::class, 'id_bengkel', 'id_bengkel');
    }
}
