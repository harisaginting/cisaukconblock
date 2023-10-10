<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Helpers\Harisa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use Session;

class Auth extends Controller
{
    protected $namespace = 'App\Http\Controllers\Admin';

    function login()
    {       
        // echo phpinfo();die;
        return view('admin.login'); 
    }
  
    function loginProcess(Request $req){
        $requestData    = $req->json()->all();
        $username = $requestData["username"];
        $model          = new Users();
        $userCek        = $model->getUserByUsername($username);
        if(!empty($userCek)){
            $user = Users::whereUuid($userCek->uuid)->first();
            if (Hash::check($requestData["password"], $user->password)) {
                
                $token          = str_replace('-', '',Uuid::uuid4()).date('dmY'); 
                $updatedToken   = Users::where('email', $user->email)->update(['token' => $token ]);

                if($user->role == 0 ){
                    if(!empty($user->confimation)){
                        return Harisa::apiResponse(401, null, 'not activated');    
                    }
                }
                return Harisa::apiResponse(200, array('token'=> $token, 'user' => $userCek), 'success login');
            }else{
              return Harisa::apiResponse(401,  null , 'wrong password');  
            }
        }else{
                return Harisa::apiResponse(401,  null , 'username not found');
        }

    }


    function validateToken($token){
        $user   = Users::where('token' , strtolower($token))->first();
        if(!empty($token) && !empty($user)){
            $user  = $user->toArray();
            return Harisa::apiResponse(200, array('token'=> $token,'username' => $user["username"]), 'token is valid');    
        }else{
            return Harisa::apiResponse(408, null, 'Unauthorized');
        }
    }

}