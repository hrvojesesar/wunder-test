<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RememberLastPage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Provjera trenutnog koraka u sesiji
        $current_step = $request->session()->get('registration_step', 1);

        // Preusmjeravanje na odgovarajući korak
        if ($current_step > 1 && !$request->is('register/step' . $current_step)) {
            return redirect('/register/step' . $current_step);
        }

        return $next($request);
    }
}
