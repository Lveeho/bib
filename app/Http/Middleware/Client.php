<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Client
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->roles->where('name', 'ontlener')->First() == true){/*zoekt naar User.php*/
                return $next($request); /*functie stopt hier als het waar is, kan maar 1 return uitvoeren*/
            }
        }
        return redirect('/'); /*hetzelfde als else*/
    }
}
