<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class RegistrationController extends Controller
{
    public function showStep1()
    {
        return view('register.step1');
    }

    public function postStep1(Request $request)
    {
        $request->session()->put('first_name', $request->first_name);
        $request->session()->put('last_name', $request->last_name);
        $request->session()->put('telephone', $request->telephone);


        $request->session()->put('registration_step', 2);

        return redirect('/register/step2');
    }

    public function showStep2()
    {
        return view('register.step2');
    }

    public function postStep2(Request $request)
    {
        $request->session()->put('street', $request->street);
        $request->session()->put('house_number', $request->house_number);
        $request->session()->put(
            'zip_code',
            $request->zip_code
        );
        $request->session()->put('city', $request->city);

        $request->session()->put('registration_step', 3);

        return redirect('/register/step3');
    }

    public function showStep3()
    {
        return view('register.step3');
    }
}
