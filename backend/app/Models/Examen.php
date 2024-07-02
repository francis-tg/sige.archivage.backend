<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;

    protected $table = 'examen';
    protected $primaryKey = 'code_examen';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;


    protected $fillable = [
        'code_examen',
        'code_session',
        'type_evaluation',
    ];

    public function semestre()
    {
        return $this->belongsTo(Semestre::class, 'code_sem');
    }

    public function session_examen()
    {
        return $this->belongsTo(Session_examen::class, 'code_session');
    }
}
