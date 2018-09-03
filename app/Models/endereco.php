<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class endereco extends Model
{
    protected $fillable = [
        'pais', 
        'estado',
        'cidade',
        'numero',
        'complemento',
    ];
    
    public $rules = [
        'pais'   => 'required',
        'estado' => 'required|min:2|max:2',
        'cidade' => 'required',
        'numero' => 'required|numeric',
    ];
}
