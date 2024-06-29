<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cathegorie extends Model
{
    use HasFactory;
    protected $table = 'cathegorie';
    protected $primaryKey = 'cathegorie_id';
    public $incrementing = true;
    public $timestamp = true;

    protected $fillable = [
        'cathegorie_id',
        'nom_cath'
    ];
}
