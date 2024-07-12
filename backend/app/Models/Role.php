<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'role';
    protected $primaryKey = 'code_role';
    public $incrementing = false;
    public $timestamp = true;

    protected $fillable = [
        'code_role',
        'label_role',
        'acreditation_role'
    ];
}
