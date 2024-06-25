<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    protected $table = 'filiere';
    protected $primaryKey = 'code_filiere';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;


    protected $fillable = [
        'code_filiere',
        'code_bureau',
        'label_filiere',
        'desc_filiere',
    ];

    public function bureau()
    {
        return $this->belongsTo(Bureau::class, 'code_bureau');
    }
}
