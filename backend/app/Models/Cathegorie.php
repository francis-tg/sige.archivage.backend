<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cathegorie extends Model
{
    use HasFactory;
    protected $table = 'categorie';
    protected $primaryKey = 'id_cat';
    public $incrementing = false;
    public $timestamp = true;

    protected $fillable = [
        'id_cat',
        'label_cat'
    ];
}
