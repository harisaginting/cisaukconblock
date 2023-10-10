<?php

namespace App\Http\Middleware;

use App\Helpers\Harisa;
use App\Models\Users;
use Closure;

class Harisaapi
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
        $token  = $request->header('Authorization');
        $token  = str_replace('bearer ', '', strtolower($token));
        $user   = Users::where('token' , $token)->first(); 
        
        $request->token = $token;
        $request->data  = $request->json()->all();

        if(!empty($request->header('Authorization')) && !empty($token) && !empty($user)){
            $request->user  = $user->toArray();
            return $next($request);    
        }else{
            return Harisa::apiResponse(408, null, 'Unauthorized');
        }
        
    }
}