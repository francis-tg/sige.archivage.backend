<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ec_ressource extends Model
{
    use HasFactory;

    protected $table = 'ec_ressource';
    protected $primaryKey = ['code_ec', 'code_res','code_pers'];
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;


    protected $fillable = [
        'code_ec',
        'code_res',
        'code_pers',
    ];

    public function ec()
    {
        return $this->belongsTo(Ec::class, 'code_ec');
    }

    public function ressources()
    {
        return $this->belongsTo(Ressource::class, 'code_res');
    }

    public function personel()
    {
        return $this->belongsTo(Personnel::class, 'code_pers');
    }
}
