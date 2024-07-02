<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ue extends Model
{
    use HasFactory;

    protected $table = 'ue';
    protected $primaryKey = 'code_ue';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;


    protected $fillable = [
        'code_ue',
        'code_sem',
        'intitule_ue',
        'desc_ue',
    ];

    public function semestre()
    {
        return $this->belongsTo(Semestre::class, 'code_sem');
    }
}
