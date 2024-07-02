<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pers_role extends Model
{
    use HasFactory;

    protected $table = 'pers_role';
    protected $primaryKey = ['code_role','code_bureau','code_pers'];
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;


    protected $fillable = [
        'code_role',
        'code_bureau',
        'code_pers',
        'date_debut_role',
        'date_fin_role',
        'satut_role',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'code_role');
    }

    public function bureau()
    {
        return $this->belongsTo(Bureau::class, 'code_bureau');
    }

    public function personel()
    {
        return $this->belongsTo(Personnel::class, 'code_pers');
    }
}
