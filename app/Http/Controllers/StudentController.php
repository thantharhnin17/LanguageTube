<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('user_type', 'student')->get();
        $students = Student::all();
        return view('admin.student.show',compact('users','students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student.create');
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
        ];
    
        $studentRules = [
            // 'photo'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone'=> 'required',
            'dob' => 'required',
            'gender' => 'required',
        ];

        $studentData = $request->input('student') ? $request->input('student') : [];

        $validator = Validator::make(
            array_merge($request->all(), $studentData),
            array_merge($userRules, $studentRules)
        );
    
        if ($validator->fails()) {
            return redirect('admin/student/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($request->hasFile('student.photo')) {
            if ($request->file('student.photo')->isValid()) {
                $validated = $request->validate([
                    'student.photo' => ['mimes:jpg,jpeg,png,gif', 'max:2048'],
                ]);
                $extension = $request->file('student.photo')->extension();
                $randomName = rand() . '.' . $extension;
                $request->file('student.photo')->storeAs('public/img/', $randomName);
            }
        }

        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        //     'student.photo'=> 'required',
        //     'student.phone'=> 'required',
        //     'student.dob' => 'required',
        //     'student.gender' => 'required',
        // ]);


        $user = new User([
            'name' => $request->input('student.name'),
            'email' => $request->input('student.email'),
            'password' => Hash::make($request->input('student.password')),
            'user_type' => 'student',
        ]);
    
        $user->save();
    
        $student = new Student([
            'photo' => $randomName,
            'phone' => $request->input('student.phone'),
            'dob' => $request->input('student.dob'),
            'gender' => $request->input('student.gender'),
        ]);
    
        $user->student()->save($student);
    
        return redirect()->route('student.index')->with('success_message', 'You have been registered as a student!');
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
    public function edit(string $id)
    {
        $student= Student::find($id);
        return view('admin.student.edit',compact('student'));
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
    public function destroy(string $id)
    {
        $student= Student::find($id);

        // Delete the associated user record
        $student->user()->delete();
        
        // Delete the student record
        $student->delete();

        return redirect()->route('student.index')
        ->with('success_message','Student delete successfully.');
    }
}
