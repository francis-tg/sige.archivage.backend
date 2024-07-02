<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $table = 'ec_ressource';
    protected $primaryKey = ['code_salle','code_ec'];
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;


    protected $fillable = [
        'code_salle',
        'code_ec',
        'code_periode',
        'debut_periode',
        'jour_periode',
        'fin_periode',
        'duree_periode',
    ];

    public function ec()
    {
        return $this->belongsTo(Ec::class, 'code_ec');
    }

    public function salle()
    {
        return $this->belongsTo(Salle::class, 'code_salle');
    }
}
