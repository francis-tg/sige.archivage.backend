<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $table = 'etudiant_ec';
    protected $primaryKey = ['code_user', 'code_ec'];
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;


    protected $fillable = [
        'code_user',
        'code_ec',
    ];

    public function ec()
    {
        return $this->belongsTo(Ec::class, 'code_ec');
    }

    public function users()
    {
        return $this->belongsTo(Users::class, 'code_user');
    }
}
