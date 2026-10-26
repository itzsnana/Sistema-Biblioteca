<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrestamoDetalle extends Model
{
    protected $table = 'prestamo_detalles';
    protected $guarded = [];

    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class, 'prestamo_id');
    }

    public function libroCopia()
    {
        return $this->belongsTo(LibroCopia::class, 'libro_copia_id');
    }
}