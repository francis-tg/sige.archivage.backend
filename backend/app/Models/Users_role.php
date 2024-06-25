<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_role extends Model
{
    use HasFactory;

    protected $table = 'users_role';
    protected $primaryKey = ['code_user', 'code_role'];
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;


    protected $fillable = [
        'code_user',
        'code_role',
        'date_debut_role',
        'date_fin_role',
        'etat_role',
    ];

    public function users()
    {
        return $this->belongsTo(Users::class, 'code_user');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'code_role');
    }
}
