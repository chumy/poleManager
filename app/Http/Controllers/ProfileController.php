<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Campeonato;
use App\Models\Circuito;
use App\Models\Carta;
use App\Models\Pais;
use Hashids\Hashids;
use Carbon\Carbon;


class ProfileController extends Controller
{

    public function show()
    {
        $user = Auth::user();

        
        return view('dashboard.show', [
            'user' => $user,
            'circuitos' => Circuito::all(),
            'pilotos' => Carta::where('tipo','0'),
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $paises = Pais::All();
        return view('profile.edit', [
            'user' => $request->user(),
            'paises' => $paises,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        
        $request->validate([
            'picture' => ['file', 'mimes:jpg,png,gif', 'max:1024'],
        ]);

        $request->user()->fill($request->validated());
        $request->user()->pais = $request->pais;
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

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
            $request->user()->avatar = $path;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

     /**
     * Locate serach
     */
    public function search(Request $request)
    {
        //
        //dd($request['hashid']);
        $user = Auth::user();
        $campeonato=Campeonato::where('hashid',$request['hashid']);
        if ($campeonato->count() == 0){
             return view('dashboard.show', [
                'user' => $user,
            ])->withErrors(['searchCampeonato' => "No se encuentra el campeonato ".$request['hashid']]);
        }
        else{
            return redirect()->route('campeonato.show' , 
                    [ 'campeonato' => $request['hashid'], 
                         'carrera' => $campeonato->first()->carreras()->first(), ]);
        }
    }

}
