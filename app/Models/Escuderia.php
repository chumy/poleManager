<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Coche;

class Escuderia extends Model
{
    use HasFactory;

    public function coche()
    {
   
        return $this->belongsTo('App\Models\Coche','coche_id');
    }
}
