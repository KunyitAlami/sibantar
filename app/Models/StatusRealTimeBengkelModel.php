<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusRealTimeBengkelModel extends Model
{
    protected $table = 'status_real_time_bengkel';
    protected $primaryKey = 'id_status_bengkel';

    protected $fillable = ['id_bengkel', 'status'];
}