<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BengkelStatusModel extends Model
{
    protected $table = 'bengkel_status';
    protected $primaryKey = 'id_status';

    protected $fillable = [
        'id_bengkel',
        'status',
    ];

    public $incrementing = true;
    protected $keyType = 'int';

    public function bengkel()
    {
        return $this->belongsTo(BengkelModel::class, 'id_bengkel', 'id_bengkel');
    }
}
