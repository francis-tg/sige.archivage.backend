<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere_niveau extends Model
{
    use HasFactory;

    protected $table = 'filiere_niveau';
    protected $primaryKey = ['code_filiere', 'code_niveau','code_ins'];
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;


    protected $fillable = [
        'code_filiere',
        'code_niveau',
        'code_ins',
    ];

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'code_filiere');
    }

    public function niveau()
    {
        return $this->belongsTo(Niveau::class, 'code_niveau');
    }

    public function ins()
    {
        return $this->belongsTo(Inscription::class, 'code_ins');
    }
}
