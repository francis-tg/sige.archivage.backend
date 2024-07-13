<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bureau_id',
        'user_id',
        'nom',
        'prenom',
        'sexe',
        'date_naissance',
        'lieu_naissance',
        'statut_mat',
        'lieu_residence',
        'first_phone',
        'second_phone',
        'cni',
        'photo',
        'lang',
        'bibliographie',
        'nb_enfant',
    ];

    /**
     * Get the bureau that the personnel belongs to.
     */
    public function bureau()
    {
        return $this->belongsTo(Bureau::class);
    }

    /**
     * Get the user that the personnel belongs to.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
