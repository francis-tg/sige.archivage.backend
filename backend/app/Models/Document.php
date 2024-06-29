<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $table = 'document';
    protected $primaryKey = 'document_id';
    public $incrementing = true;
    public $timestamp = true;

    protected $fillable = [
        'document_id',
        'cathegorie_id',
        'titre',
        'auteur',
        'date_creation',
        'date_derniere_mod',
        'type',
        'resume',
        'taille',
        'reference',
        'emplacement_doc',
        'status_doc'
    ];
}
