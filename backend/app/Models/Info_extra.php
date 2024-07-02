<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info_extra extends Model
{
    use HasFactory;

    protected $table = 'info_extra';
    protected $primaryKey = 'code_info_extra';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;


    protected $fillable = [
        'code_info_extra',
        'nom_pere_user',
        'nom_mere_user',
        'telephone_tuteur_user',
        'email_tuteur_user',
        'telephone_mere',
    ];
}
