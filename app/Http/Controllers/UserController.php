<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Circuito;
use App\Models\Carta;

class UserController extends Controller
{
    public function show(String $user)
    {
        $user = User::find($user);
        return view('user.show', [
            'user' => $user,
            'circuitos' => Circuito::all(),
            'pilotos' => Carta::where('tipo','0'),
        ]);
    }
}
