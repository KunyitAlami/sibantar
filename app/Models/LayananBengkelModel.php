<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LayananBengkelModel extends Model
{
    use SoftDeletes; 
    protected $table = 'layanan_bengkel';
    protected $primaryKey = 'id_layanan_bengkel';

    protected $fillable = [
        'id_bengkel',
        'nama_layanan',
        'deskripsi',
        'harga_awal',
        'harga_akhir',
        'kategori'
    ];

    protected $guarded = [
        'estimasi_harga'
    ];


    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
