<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\state;


class StateController extends Controller
{
    public function getAllState() {
        $states = state::where('status',1)->get([
            'id',
            'names',
            'status'
        ]);
        
    return $states;
    }

    public function getIdState() {
        $states= state::where('id', 1)->get([
            'id',
            'names',
            'status'
        ]);
        
    return $states;
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
