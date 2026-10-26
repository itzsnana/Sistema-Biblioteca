<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibroCopia extends Model
{
    protected $table = 'libro_copias';
    protected $guarded = [];

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libro_id');
    }

    public function prestamoDetalles()
    {
        return $this->hasMany(PrestamoDetalle::class, 'libro_copia_id');
    }
}
