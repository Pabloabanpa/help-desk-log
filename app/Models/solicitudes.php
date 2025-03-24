<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';

    protected $fillable = [
        'solicitante',
        'tecnico',
        'equipo_id',
        'descripcion',
        'archivo',
        'estado',
    ];

    // Relaciones
    //public function solicitanteUser()
    //{
     //   return $this->belongsTo(User::class, 'solicitante');
   // }

   // public function tecnicoUser()
   //{
      //  return $this->belongsTo(User::class, 'tecnico');
    //}

    //public function atenciones()
    //{
//return $this->hasMany(Atencion::class, 'solicitud_id');
   // }
}
