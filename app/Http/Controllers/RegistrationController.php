<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

class RegistrationController extends Controller
{
    public function showStep1()
    {
        return view('register.step1');
    }

    public function postStep1(Request $request)
    {
        // Validacija ulaznih podataka
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'telephone' => 'required|string|max:15',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Validation failed',
                'messages' => $validator->errors(),
            ], 422);
        }

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
        // Validacija ulaznih podataka
        $validator = Validator::make($request->all(), [
            'street' => 'required|string|max:100',
            'house_number' => 'required|string|max:10',
            'zip_code' => 'required|string|max:10',
            'city' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Validation failed',
                'messages' => $validator->errors(),
            ], 422);
        }

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

    public function postStep3(Request $request)
    {
        // Validacija ulaznih podataka
        $validator = Validator::make($request->all(), [
            'account_owner' => 'required|string|max:255',
            'iban' => 'required|string|max:34',
        ]);

        if ($validator->fails()) {
            // Vraćanje odgovora sa statusnim kodom 422 i porukom o grešci
            return response()->json([
                'error' => 'Validation failed',
                'messages' => $validator->errors(),
                'data' => $request->all(), // Uključivanje stvarnih podataka koje je korisnik poslao
            ], 422);
        }

        // Pohrana podataka iz trećeg koraka u sesiju
        $request->session()->put('account_owner', $request->account_owner);
        $request->session()->put('iban', $request->iban);

        // Preuzimanje podataka iz sesije
        $first_name = $request->session()->get('first_name');
        $last_name = $request->session()->get('last_name');
        $telephone = $request->session()->get('telephone');
        $street = $request->session()->get('street');
        $house_number = $request->session()->get('house_number');
        $zip_code = $request->session()->get('zip_code');
        $city = $request->session()->get('city');
        $account_owner = $request->session()->get('account_owner');
        $iban = $request->session()->get('iban');

        // Provjera postojanja korisnika u bazi
        $user = User::where('first_name', $first_name)
            ->where('last_name', $last_name)
            ->where('telephone', $telephone)
            ->first();

        if ($user) {
            $user->update([
                'street' => $street,
                'house_number' => $house_number,
                'zip_code' => $zip_code,
                'city' => $city,
                'account_owner' => $account_owner,
                'iban' => $iban,
                'registration_step' => 3,
            ]);
        } else {
            $user = User::create([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'telephone' => $telephone,
                'street' => $street,
                'house_number' => $house_number,
                'zip_code' => $zip_code,
                'city' => $city,
                'account_owner' => $account_owner,
                'iban' => $iban,
                'registration_step' => 3,
            ]);
        }

        $apiUrl = config('services.payment_api.url');

        $response = Http::post($apiUrl, [
            'customerId' => $user->id_user,
            'iban' => $iban,
            'owner' => $account_owner,
        ]);

        if ($response->successful()) {
            $paymentDataId = $response->json()['paymentDataId'];
            $user->update([
                'payment_data_id' => $paymentDataId,
                'registration_step' => 4,
            ]);

            $request->session()->put('paymentDataId', $paymentDataId);

            $request->session()->invalidate();

            return response()->json([
                'message' => 'Registration successful',
                'paymentDataId' => $paymentDataId,
            ], 200);
        } else {
            // Vraćanje JSON odgovora s statusom 400 Bad Request
            return response()->json([
                'status' => 400,
                'message' => 'Error registering user!',
                'data' => $request->all(),
            ], 400);
        }
    }
}
