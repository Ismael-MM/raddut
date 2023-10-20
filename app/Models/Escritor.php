<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escritor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];


    public function articulos()
    {
        return $this->hasMany(Articulos::class);
    }
}
