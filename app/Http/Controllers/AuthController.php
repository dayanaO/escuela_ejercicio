<?php

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Request\RegisterRequest;
use App\Http\Request\LoginRequest;
use App\Http\Controllers;

class AuthController extends Controller
{
    public function login(LoginRequest $request) {

        $validated = $request->validated();

        $user = User::where('email', $request->email)
        ->first();
    
        if ($user == NULL || !Hash::check($request->password, $user->password)){
            return response()->json([
                'message' =>"Usuario no encontrado. Verifique sus credenciales."
            ], 401);
        }
   $tokenResult =$user->createToken('Personal Access Token');
    }
          
    public function createStates(Request $request)
    {
    
        
                $states= new state([
                    'names' => $request->names,
                    'status' => 1,
                    ]);
        
                $states->save();
                return response()->json($states, 200);
    }

    public function destroyStates(int $id)
    {
    $states = state::where('id', $id)->first();
    $states->status=1;
    $states->save();

    return response()->json($states, 200);
    }

    public function updateStates(Request $request, int $id)
    {
        $states = state::where('id', $id)->first();
        $states->names =$request->names;
        $states->status =$request->status;

        $states->save();
        return response()->json($states, 200);
    }
}
