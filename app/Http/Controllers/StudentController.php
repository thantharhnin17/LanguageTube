<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
        $users = User::where('user_type', 'student')->orderByDesc('id')->get();
        // $students = Student::all();
        return view('admin.student.show',compact('users'));
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
    
         $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
                'photo'=> 'required',
                'phone'=> 'required',
                'dob' => 'required',
                'gender' => 'required',
        ]);

        if ($request->hasFile('photo')) 
        {
            if ($request->file('photo')->isValid()) 
            {
                $validated = $request->validate([
                    'photo' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ]);
                $extension = $request->photo->extension();
                $randomName = rand().".".$extension;
                $request->photo->storeAs('/public/img/',$randomName);
                
            }
        }

            // dd(request('user_type'));

            User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => Hash::make(request('password')),
                'photo' => $randomName,
                'phone' => request('phone'),
                'dob' => request('dob'),
                'gender' => request('gender'),
                'user_type' => 'student',
            ]);

            return redirect()->route('student.index')->with('success_message', 'Student created successfully.');
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
        $user= User::find($id);
        return view('admin.student.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone'=> 'required',
            'dob' => 'required',
            'gender' => 'required',
        ]);

        $user = User::find($id);
        if ($request->hasFile('photo')) 
        {
            if ($request->file('photo')->isValid()) 
            {
                $validated = $request->validate([
                    'photo' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ]);
                $extension = $request->photo->extension();
                $randomName = rand().".".$extension;
                $request->photo->storeAs('/public/img/',$randomName);
                    $user->photo = $randomName;
            }
        }   
        else{
            $user->photo = $user->photo;
        }

        if(isset($request->password)){
            $validated = $request->validate([
                'password' => ['string', 'min:8'],
            ]);
            $user->password = Hash::make(request('password'));
        }
        else{
            $user->password = $user->password;
        }

            $user->name = request('name');
            $user->email = request('email');
            $user->phone = request('phone');
            $user->dob = request('dob');
            $user->gender = request('gender');
         
           $user->save();
           return redirect()->route('student.index')
            ->with('success_message', 'Student update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user= User::find($id);
        $image = $user->photo;

        $path = "public/img/{$image}";

        if(Storage::exists($path)) {
            Storage::delete($path);
        }

        $user->delete();

        return redirect()->route('student.index')
        ->with('success_message','Student delete successfully.');
    }
}
