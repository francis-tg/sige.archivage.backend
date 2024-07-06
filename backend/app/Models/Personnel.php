<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;
    protected $table = 'personnel';
    protected $primaryKey = 'code_pers';
    public $incrementing = false;
    public $timestamp = true;

    protected $fillable = [
        'code_pers',
        'nom_pers',
        'prenom_pers',
        'sexe_pers',
        'date_naissance_pers',
        'lieu_naissance_pers',
        'statut_mat_pers',
        'lieu_residence_pers',
        'first_phone_pers',
        'second_phone_pers',
        'cni_pers',
        'email_pers',
        'login_pers',
        'pwd_pers',
        'photo_pers',
        'lang_pers',
        'bibliographie_pers',
        'nb_enfant_pers',
    ];
}
