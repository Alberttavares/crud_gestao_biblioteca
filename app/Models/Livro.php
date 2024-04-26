<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use app\Models\Genero;

class Livro extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'num_paginas',
        'qtde_estoque',
        'genero_id'
    ];
    public function generos(): HasMany
    {
        return $this->hasMany(Genero::class);
    }
}
