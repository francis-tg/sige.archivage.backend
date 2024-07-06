<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bureau extends Model
{
    use HasFactory;
    protected $table = 'bureau';
    protected $primaryKey = 'code_bureau';
    public $incrementing = false;
    public $timestamp = true;

    protected $fillable = [
        'code_bureau',
        'label_div',
        'desc_div',
        'type_bureau'
    ];
}
