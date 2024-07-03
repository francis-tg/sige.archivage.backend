<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'permission';
    protected $primaryKey = 'code_permis';
    public $incrementing = false;
    public $timestamp = true;

    protected $fillable = [
        'code_permis',
        'label_permis'
    ];
}
