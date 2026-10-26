<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'libros';
    protected $guarded = [];

    public function editorial()
    {
        return $this->belongsToMany(Autor::class, 'publisher_id');
    }

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'libro_autor', 'libro_id', 'author_id');
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'libro_categoria', 'libro_id', 'category_id');
    }

    public function copias()
    {
        return $this->hasMany(LibroCopia::class, 'libro_id');
    }
    
    public function resenas()
    {
        return $this->hasMany(Resena::class, 'libros_id');
    }
}
