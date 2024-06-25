<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'code_user';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;


    protected $fillable = [
        'code_user',
        'code_info_extra',
        'nom_user',
        'prenom_user',
        'sexe_user',
        'date_naissance_user',
        'lieu_naissance_user',
        'statut_mat_user',
        'lieu_resi_user',
        'first_phone_user',
        'second_phone_user',
        'numero_cni_user',
        'email_user',
        'date_deliv_cni_user',
        'login_user',
        'pwd_user',
        'photo_user',
        'handicap_user',
        'nbre_enfant_user',
        'nationalite_user',
        'region_origine_user',
        'depart_origine_user',
        'arrond_origine_user',
        'bibiographie_user',
    ];

    public function info_extra()
    {
        return $this->belongsTo(Info_extra::class, 'code_info_extra');
    }
}
