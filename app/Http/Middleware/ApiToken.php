<?php

namespace App\Http\Middleware;

use Closure;
use User;

class ApiToken
{
    
    public function handle($request, Closure $next)
    {
        //recuperiamo il token
        $api_token= $request->header('authorization');
        if(empty($api_token)){
            return response()->json([
                'success' =>false,
                'error' =>'non sei autenticato'
            ]); 
        }
        //togliamo la parte Bearer(vedi Postman) prima con substr
        //7 rappresenta il num di caratteri della parola Bearer
        $api_token=substr($api_token,7);
        //mi deve restituire un solo elemento quindi usiamo il where
        $user = User::where('api_token',$api_token)->first();
        if(!$user){
            return response()->json([
                'success' =>false,
                'error' =>'non sei autenticato'
            ]);
        }

        return $next($request);
    }
}
