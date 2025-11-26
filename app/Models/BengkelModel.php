<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BengkelModel extends Model
{
    protected $table = 'bengkel';    
    protected $primaryKey = 'id_bengkel'; 
    public $incrementing = true;       

    protected $fillable = [
        'link_gmaps',
        'nama_bengkel',
        'kecamatan',
        'alamat_lengkap',
        'jam_buka',
        'jam_tutup',
        'jam_operasional',
        'status',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }

    public function setJamBukaAttribute($value)
    {
        $this->attributes['jam_buka'] = $value;
        $this->attributes['jam_operasional'] = $value . ' - ' . ($this->jam_tutup ?? '');
    }

    public function setJamTutupAttribute($value)
    {
        $this->attributes['jam_tutup'] = $value;
        $this->attributes['jam_operasional'] = ($this->jam_buka ?? '') . ' - ' . $value;
    }

    public function mount()
    {
        $this->loadBengkels();
    }

    public function loadBengkels()
    {
        $this->bengkels = BengkelModel::all();
    }

    public function layananBengkel()
    {
        return $this->hasMany(LayananBengkelModel::class, 'id_bengkel', 'id_bengkel');
    }

    public function status()
    {
        return $this->hasMany(BengkelStatusModel::class, 'id_bengkel', 'id_bengkel');
    }

    public function statusRealTime()
    {
        return $this->hasOne(StatusRealTimeBengkelModel::class, 'id_bengkel', 'id_bengkel')->latestOfMany('id_status_bengkel');
    }



}
