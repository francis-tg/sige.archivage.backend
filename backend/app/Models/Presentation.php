<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    use HasFactory;

    protected $table = 'presentation';
    protected $primaryKey = 'code_pres';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;


    protected $fillable = [
        'code_pres',
        'code_bureau',
        'photo_chef',
        'message',
        'cursus_ing',
        'grille_ing',
        'science_ing',
        'grille_science',
    ];

    public function bureau()
    {
        return $this->belongsTo(Bureau::class, 'code_bureau');
    }
}
