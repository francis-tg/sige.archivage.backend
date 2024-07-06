<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $table = 'document';
    protected $primaryKey = 'doc_id';
    public $incrementing = true;
    public $timestamp = true;

    protected $fillable = [
        'doc_id',
        'id_cat',
        'code_bureau',
        'titre',
        'auteur',
        'date_creation',
        'date_der_mod',
        'type',
        'resumé',
        'reference',
        'emplacement_doc',
        'status_doc',
        'taille'
    ];
}
