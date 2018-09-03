<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class filme extends Model
{
    protected $fillable = [
        'titulo', 
        'ano',
        'diretor'
    ];
    
    public $rules = [
        'titulo'  => 'required',
        'ano'     => 'required|numeric',
        'diretor' => 'required',
    ];
}
