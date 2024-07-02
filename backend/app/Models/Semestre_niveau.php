<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre_niveau extends Model
{
    use HasFactory;

    protected $table = 'semestre_niveau';
    protected $primaryKey = ['code_niveau','code_sem'];
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;


    protected $fillable = [
        'code_niveau',
        'code_sem',
    ];

    public function niveau()
    {
        return $this->belongsTo(Niveau::class, 'code_niveau');
    }

    public function semestre()
    {
        return $this->belongsTo(Semestre::class, 'code_sem');
    }
}
