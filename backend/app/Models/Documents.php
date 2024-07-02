<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;

    protected $table = 'documents';
    protected $primaryKey = 'code_doc';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;


    protected $fillable = [
        'code_doc',
        'code_session',
        'code_bureau',
        'label_doc',
        'description_doc',
        'type_doc',
        'nom_fichier',
    ];

    public function session()
    {
        return $this->belongsTo(Session_examen::class, 'code_session');
    }

    public function bureau()
    {
        return $this->belongsTo(Bureau::class, 'code_bureau');
    }
}
