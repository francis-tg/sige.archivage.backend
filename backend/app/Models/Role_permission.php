<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_permission extends Model
{
    use HasFactory;

    protected $table = 'role_permission';
    protected $primaryKey = ['code_role', 'code_permis'];
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;


    protected $fillable = [
        'code_role',
        'code_permis',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'code_role');
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class, 'code_permis');
    }
}
