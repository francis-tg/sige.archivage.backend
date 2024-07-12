<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersRole extends Model
{
    use HasFactory;
    protected $table = 'pers_role';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamp = true;

    protected $fillable = [
        'id',
        'code_role',
        'code_bureau',
        'code_pers',
        'date_debut_role',
        'date_fin_role',
        'statut'
    ];
}
