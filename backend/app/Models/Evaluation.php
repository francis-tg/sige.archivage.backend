<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Metadata\Uses;

class Evaluation extends Model
{
    use HasFactory;

    protected $table = 'evaluation';
    protected $primaryKey = ['code_ec', 'code_examen','code_user'];
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;


    protected $fillable = [
        'code_ec',
        'code_examen',
        'code_user',
        'date_evaluation',
        'code_ano',
        'note_eval',
        'date_evalu',
    ];

    public function ec()
    {
        return $this->belongsTo(Ec::class, 'code_ec');
    }

    public function examen()
    {
        return $this->belongsTo(Examen::class, 'code_examen');
    }

    public function users()
    {
        return $this->belongsTo(Users::class, 'code_user');
    }
}
