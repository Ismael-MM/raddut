<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulos extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'titulo',
    ];

    public function writer()
    {
        return $this->belongsTo('App\Models\Escritor');
    }
}
