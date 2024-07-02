<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anneescolaire extends Model
{
    use HasFactory;

    protected $table = 'anneescolaire';
    protected $primaryKey = 'code_annee';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;


    protected $fillable = [
        'code_annee',
        'debut_annee',
        'fin_annee',
    ];
}
