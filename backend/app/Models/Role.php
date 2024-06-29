<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'role';
    protected $primaryKey = 'role_id';
    public $incrementing = true;
    public $timestamp = true;

    protected $fillable = [
        'admin_id',
        'role_id',
        'nom_role'
    ];
}
