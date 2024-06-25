<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session_examen extends Model
{
    use HasFactory;

    protected $table = 'session_examen';
    protected $primaryKey = 'code_session';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;


    protected $fillable = [
        'code_session',
        'code_annee',
        'label_session',
        'date_debut_session',
        'date_fin_session',
        'statut_session',
    ];

    public function anneescolaire()
    {
        return $this->belongsTo(Anneescolaire::class, 'code_annee');
    }
}
