<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userRules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_type' => ['required', 'string', Rule::in(['admin', 'student', 'teacher'])],
        ];
    
        $studentRules = [
            'photo'=> 'required',
            'dob' => 'required',
            'gender' => 'required',
        ];
    
        $validator = Validator::make(array_merge($request->all(), $request->input('student')), array_merge($userRules, $studentRules));
    
        if ($validator->fails()) {
            return redirect('register/student')
                        ->withErrors($validator)
                        ->withInput();
        }
    
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'user_type' => 'student',
        ]);
    
        $user->save();
    
        $student = new Student([
            'photo' => $request->input('student.photo'),
            'dob' => $request->input('student.dob'),
            'gender' => $request->input('student.gender'),
            // add any other student fields you need here
        ]);
    
        $user->student()->save($student);
    
        return redirect('/home')->with('success', 'You have been registered as a student!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
