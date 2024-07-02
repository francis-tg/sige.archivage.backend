<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;

    protected $table = 'salle';
    protected $primaryKey = 'code_salle';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;


    protected $fillable = [
        'code_salle',
        'nb_place_salle',
        'etat_salle',
        'desc_salle',
    ];
}
