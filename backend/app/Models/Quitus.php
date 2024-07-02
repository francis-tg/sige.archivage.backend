<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quitus extends Model
{
    use HasFactory;

    protected $table = 'quitus';
    protected $primaryKey = ['code_ins','code_tranche','code_mode'];
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;


    protected $fillable = [
        'code_ins',
        'code_tranche',
        'code_mode',
        'numero_quitus',
        'date_paiement',
        'statut_quitus',
    ];

    public function ins()
    {
        return $this->belongsTo(Inscription::class, 'code_ins');
    }

    public function tranche()
    {
        return $this->belongsTo(Tranche::class, 'code_tranche');
    }

    public function mode()
    {
        return $this->belongsTo(Modepaiment::class, 'code_mode');
    }
}
