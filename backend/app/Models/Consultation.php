<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $table = 'consultation';
    protected $primaryKey = ['code_pers', 'doc_id'];
    public $incrementing = true;
    public $timestamp = true;

    protected $fillable = [
        'code_pers',
        'doc_id',
        'date_consultation'
    ];
}
