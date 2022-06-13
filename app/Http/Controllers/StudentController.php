<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getAllStudent() {
        $student = Student::where('status',1)->get([
            'id',
            'names',
            'lastnames',
            'birthday',
            'address',
            'email',
            'phone',
            'status'
        ]);
        
    return $student;
    }

    public function getIdStudent() {
        $student = Student::where('id', 1)->get([
            'id',
            'names',
            'lastnames',
            'birthday',
            'address',
            'email',
            'phone',
            'status'
        ]);
        
    return $student;
    }
        
    public function createStudent(NuevoStudentRequest $request)
    {
                $request->validated();
        
                $student= new Student([
                    'names' => $request->names,
                    'status' => 1,
                    'lastnames'=> $request->lastnames,
                    'birthday'=> $request->birthday,
                    'address'=> $request->address,
                    'email'=> $request->email,
                    'phone'=> $request->phone
                    
                ]);
        
                $student->save();
                return response()->json($student, 200);
    }

    public function destroyStudent(int $id)
    {
    $student = Student::where('id', $id)->first();
    $student->status=1;
    $student->save();

    return response()->json($student, 200);
    }

    public function updateStudent(Request $request, int $id)
    {
        $student = Autor::where('id', $id)->first();
        $student->names =$request->names;
        $student->status =$request->status;

        $student->save();
        return response()->json($student, 200);
    }
}
