<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'service';
    protected $primaryKey = 'service_id';
    public $incrementing = true;
    public $timestamp = true;

    protected $fillable = [
        'service_id',
        'nom_service'
    ];
}
