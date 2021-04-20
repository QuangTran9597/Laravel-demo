<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $maxage= 22)
    {
        Log::info('message');
        $maxage = (int) $maxage;
        $age =(int) $request->input('age');

        if($age > $maxage){
            //  return $next($request);
             dd($age);
        }
        return redirect('home');
        $response = $next($request);
        Log::info('After Middleware');
        return $response;

   }
}
