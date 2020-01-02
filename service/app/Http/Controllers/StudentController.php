<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Request $student)
    {
        $validator = Validator::make($student->all(), [ 
            'id' => 'required'
        ]);
        try {
            $student = Student::findOrFail($student->id);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'لا يوجد طالب بهذا الرقم!',
                'execption' => $exception
            ], 404);
        }
        $student = $student->with('major')->with('skills')->with('user')->with('offers')->where('id','=',$student->id)->get()->toArray()[0];

        $student['major'] = $student['major']['major'];

        for($i = 0; $i < sizeof($student['skills']); $i++)
        {
            $student['skills'][$i] = $student['skills'][$i]['skill'];
        }
        for($i = 0; $i < sizeof($student['offers']); $i++)
        {
            $student['offers'][$i]['status'] = $student['offers'][$i]['status']['status'];
        }

        return response()->json($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
