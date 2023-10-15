<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    public function ciclo()
    {
        return $this->belongsTo(Ciclo::class, 'ciclo_id', 'id');
    }
}
