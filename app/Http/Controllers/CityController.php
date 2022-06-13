<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\city;

class CityController extends Controller
{
    public function getAllCity() {
        $city = city::where('status',1)->get([
            'id',
            'names',
            'status'
        ]);
        
    return $city;
    }

    public function getIdCity() {
        $city= city::where('id', 1)->get([
            'id',
            'names',
            'status'
        ]);
        
    return $city;
    }
        
    public function createCity(Request $request)
    {
    
        
                $city= new state([
                    'names' => $request->names,
                    'status' => 1,
                    ]);
        
                $city->save();
                return response()->json($city, 200);
    }

    public function destroyCity(int $id)
    {
    $city = city::where('id', $id)->first();
    $city->status=1;
    $city->save();

    return response()->json($city, 200);
    }

    public function updateCity(Request $request, int $id)
    {
        $city = state::where('id', $id)->first();
        $city->names =$request->names;
        $city->status =$request->status;

        $city->save();
        return response()->json($city, 200);
    }
}
