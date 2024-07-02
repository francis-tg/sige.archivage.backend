<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tranche extends Model
{
    use HasFactory;

    protected $table = 'tranche';
    protected $primaryKey = 'code_tranche';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;


    protected $fillable = [
        'code_tranche',
        'lable_tranche',
        'montant_tranche',
    ];
}
