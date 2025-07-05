<?php

namespace App\Http\Middleware;

use App\Helpers\Harisa;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class Harisaapi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Authorization');
        $token = str_replace('bearer ', '', strtolower($token));
        $user = User::where('token', $token)->first(); 
        
        // Merge custom data into request instead of setting properties directly
        $request->merge([
            'token' => $token,
            'data' => $request->json()->all(),
        ]);

        if (!empty($request->header('Authorization')) && !empty($token) && !empty($user)) {
            $request->merge(['user' => $user->toArray()]);
            return $next($request);    
        } else {
            return Harisa::apiResponse(408, null, 'Unauthorized');
        }
    }
}