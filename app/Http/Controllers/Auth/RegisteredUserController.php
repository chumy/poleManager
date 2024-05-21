<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pais;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Hashids\Hashids;
use Carbon\Carbon;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $paises = Pais::All();
        return view('auth.register', ['paises' => $paises]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'picture' => ['file', 'mimes:jpg,png,gif', 'max:1024'],
        ]);

        $path = null;
        if ($request->hasFile('picture')){
            $current_date_time = Carbon::now()->toDateTimeString(); 
            $stringhash = $path.$request->email.$current_date_time;
            $hashids = new Hashids($stringhash);
            $filename= $hashids->encode(1, 2, 3); 
            $ext = $request->file('picture')->extension();
            $filename = $filename.'.'.$ext;
            $path = $request->picture->storeAs('avatars', $filename, 'public_uploads');
            $path = '/uploads/'.$path;

        }else{
            $path = 'images/piloto.png';
        }

        
        //dd($request->country);

        //dd($path);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $path,
            'pais' => $request->country,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
