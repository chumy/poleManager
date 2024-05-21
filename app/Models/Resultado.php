<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;

    public function inscrito()
    {
        return $this->belongsTo('App\Models\Inscrito')->first();
    }

    public function carrera()
    {
        return $this->belongsTo('App\Models\Carrera')->first();
    }

}
