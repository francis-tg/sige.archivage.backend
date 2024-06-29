<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $table = 'consultation';
    protected $primaryKey = 'consultation_id';
    public $incrementing = true;
    public $timestamp = true;

    protected $fillable = [
        'consultation_id',
        'cathegorie_id',
        'document_id',
        'service_id'
    ];
}
