<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BengkelModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// class UserModel extends Model
// {
//     //
// }

class UserModel extends Authenticatable
{
    use HasFactory;

    use Notifiable;

    protected $table = 'user'; 
    protected $primaryKey = 'id_user';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'wa_number',
        'skor'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function bengkel()
    {
        return $this->hasMany(BengkelModel::class, 'id_user', 'id_user');
    }

    public function mount()
    {
        $this->loadUsers();
    }

    public function loadUsers()
    {
        $this->users = UserModel::all();
    }

}
