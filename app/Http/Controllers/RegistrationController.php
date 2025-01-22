<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class RegistrationController extends Controller
{
    // Prikaz prvog koraka registracije
    public function showStep1()
    {
        return view('register.step1');
    }

    // Obrada podataka iz prvog koraka
    public function postStep1(Request $request)
    {
        // Pohranite podatke iz prvog koraka u sesiju
        $request->session()->put('first_name', $request->first_name);
        $request->session()->put('last_name', $request->last_name);
        $request->session()->put('telephone', $request->telephone);

        // Pohranite trenutni korak u sesiju
        $request->session()->put('registration_step', 2);

        // Preusmjerite korisnika na drugi korak registracije
        return redirect('/register/step2');
    }

    // Prikaz drugog koraka registracije
    public function showStep2()
    {
        return view('register.step2');
    }
}
