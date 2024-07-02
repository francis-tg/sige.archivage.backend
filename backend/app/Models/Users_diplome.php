<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_diplome extends Model
{
    use HasFactory;

    protected $table = 'users_diplome';
    protected $primaryKey = ['code_user', 'code_dip'];
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;


    protected $fillable = [
        'code_user',
        'code_dip',
        'annee_dip',
        'institution_dip',
        'mention_dip',
        'pays_dip',
    ];

    public function users()
    {
        return $this->belongsTo(Users::class, 'code_user');
    }

    public function dipmome()
    {
        return $this->belongsTo(Diplome::class, 'code_dip');
    }
}
