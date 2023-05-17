<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Teacher;
use App\Models\Language;
use App\Models\Classroom;
use App\Models\TeacherLevel;
use Illuminate\Http\Request;
use App\Models\PaymentConfirm;
use Illuminate\Validation\Rule;
use App\Models\ClassroomStudent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('user_type', 'user')->orderByDesc('id')->get();
        return view('admin.user.show',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $languages = Language::all();
        return view('admin.user.create');
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

            $user = User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => Hash::make(request('password')),
                'user_type' => 'user',
                'photo' => $randomName,
                'phone' => request('phone'),
                'dob' => request('dob'),
                'gender' => request('gender'),
            ]);

            
            return redirect()->route('user.index')->with('success_message', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user= User::find($id);
        if($user->user_type == "student"){
            $classroomStudents = ClassroomStudent::where('user_id', $id)->get();
            $paymentConfirms = PaymentConfirm::all();
            return view('main.profile',compact('user','classroomStudents','paymentConfirms'));
        }elseif($user->user_type == "teacher"){
            $classrooms = Classroom::where('user_id', $id)->get();
            return view('main.profile',compact('user','classrooms'));
        }else{
            return view('main.profile',compact('user'));
        }
        
    }

    /**
     * get one classroom
     */
    public function getClassroom($id,$class_id) {

        $student = User::find($id);
        $classroom = Classroom::find($class_id);
        $paymentConfirms = PaymentConfirm::all();
        return view('main.profile_classroom',compact('student','classroom','paymentConfirms'));
    }

    /**
     * get one student list by classroom
     */
    public function getStuList($id,$class_id) {

        $classroom = Classroom::find($class_id);
        $students = $classroom->students;
        $paymentConfirms = PaymentConfirm::all();
        
        return view('main.profile_stuList',compact('classroom','students', 'paymentConfirms'));
        // return view('main.profile_classroom',compact('student','classroom','paymentConfirms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user= User::find($id);
        $languages = Language::all();
        return view('admin.user.edit',compact('user','languages'));
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
            // $user->user_type = request('user_type');
            $user->phone = request('phone');
            $user->dob = request('dob');
            $user->gender = request('gender');
         
           $user->save();


           return redirect()->route('user.index')
            ->with('success_message', 'User update successfully.');
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

        return redirect()->route('user.index')
        ->with('success_message','User delete successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function profileUpdate(Request $request, string $id)
    {
        $classroomStudents = ClassroomStudent::where('user_id', $id)->get();
        $paymentConfirms = PaymentConfirm::all();
        
        try {
            $validator = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'phone'=> 'required',
                'dob' => 'required',
                'gender' => 'required',
                'curPw' => '',
                'newPw' => '',
                'confirmPw' => '',
            ]);
        
            // Validation passed
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

            session()->flash('success_message', 'Student update successfully.');
            return view('main.profile',compact('user','classroomStudents','paymentConfirms'));

            } catch (\Illuminate\Validation\ValidationException $e) {
                // Validation failed
                $errors = $e->validator->errors();
            
                session()->flash('fail_message', $errors);
                return view('main.profile',compact('user','classroomStudents','paymentConfirms'));
            }

        }

        public function updatePassword(Request $request, $id)
        {
            $user = User::findOrFail($id);
            $classroomStudents = ClassroomStudent::where('user_id', $id)->get();
            $paymentConfirms = PaymentConfirm::all();

            try {
                $validator = $request->validate([
                    'name' => '',
                    'email' => '',
                    'phone'=> '',
                    'dob' => '',
                    'gender' => '',
                    'curPw' => 'required',
                    'newPw' => 'required|min:8',
                    'confirmPw' => 'required|same:newPw',
                ]);

                // Verify current password
                if (!Hash::check($request->curPw, $user->password)) {

                    session()->flash('fail_message', 'Password update Fail.Incorrect current password.');
                    return view('main.profile',compact('user','classroomStudents','paymentConfirms'));
                        // return redirect()->back()->withErrors(['curPw' => 'Incorrect current password']);
                    }
    
                    // Update password
                    $user->password = Hash::make($request->newPw);
                    $user->save();
    
                    session()->flash('success_message', 'Password update successfully.');
                    return view('main.profile',compact('user','classroomStudents','paymentConfirms'));

            } catch (\Illuminate\Validation\ValidationException $e) {
                // Validation failed
                $errors = $e->validator->errors();
            
                session()->flash('fail_message', $errors);
                return view('main.profile',compact('user','classroomStudents','paymentConfirms'));
            }
                       

            
        }
}
