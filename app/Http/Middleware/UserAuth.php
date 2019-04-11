<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use JWTAuthException;

class UserAuth
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
        $userLogged = JWTAuth::user();
        //echo "->";
        //print_r($userLogged);
        echo $userLogged['id'] .'---'.$request['id'];
        if($userLogged['id'] == $request['id']){
            return $next($request);
        }
        else{
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
