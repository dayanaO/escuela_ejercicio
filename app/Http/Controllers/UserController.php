<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser() {
        $user = User::where('is_admin',1)->get([
            'id',
            'names',
            'lastnames',
            'username',
            'is_admin',
            'email',
            'password',
            'status'
        ]);
        
        return $user;
         }
        
            public function create(NuevoUserRequest $request)
            {
                $request->validated();
        
                $user= new User([
                    'names' => $request->name,
                    'is_admin' => 1
                ]);
        
                $user->save();
                return response()->json($user, 200);
    }
}
