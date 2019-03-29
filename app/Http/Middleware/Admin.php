<?php
/**
 * Created by PhpStorm.
 * User: wilde
 * Date: 26/03/2019
 * Time: 14:40
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->isAdmin()){/*zoekt naar User.php*/
                return $next($request); /*functie stopt hier als het waar is, kan maar 1 return uitvoeren*/
            }
        }
        return redirect('/'); /*hetzelfde als else*/
    }
}
