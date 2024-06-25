<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $table = 'inscription';
    protected $primaryKey = 'code_ins';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;


    protected $fillable = [
        'code_ins',
        'code_user',
        'code_annee',
        'date_ins',
        'statut_ins',
    ];

    public function users()
    {
        return $this->belongsTo(Users::class, 'code_user');
    }

    public function anneescolaire()
    {
        return $this->belongsTo(Anneescolaire::class, 'code_annee');
    }
}

