<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;
    protected $table = 'role_permission';
    protected $primaryKey = 'code_permis';
    public $incrementing = false;
    public $timestamp = true;

    protected $fillable = [
        'code_permis',
        'code_role'
    ];
}
