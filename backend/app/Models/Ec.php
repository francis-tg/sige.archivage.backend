<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ec extends Model
{
    use HasFactory;

    protected $table = 'ec';
    protected $primaryKey = 'code_ec';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;


    protected $fillable = [
        'code_ec',
        'code_ue',
        'intitule_ec',
        'credit_ec',
        'vh_ec',
        'cm_ec',
        'td_ec',
        'tp_ec',
        'tpe_ec',
    ];

    public function ue()
    {
        return $this->belongsTo(Ue::class, 'code_ue');
    }
}
