<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modepaiment extends Model
{
    use HasFactory;

    protected $table = 'modepaiment';
    protected $primaryKey = 'code_mode';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;


    protected $fillable = [
        'code_mode',
        'label_mode',
        'desc_mode',
    ];
}
