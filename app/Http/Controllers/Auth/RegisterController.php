<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Level;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_type' => ['required', 'string', Rule::in(['admin', 'student', 'teacher'])],
        ]);
    
        $userType = $data['user_type'];
        if ($userType === 'admin') {
            $validator->mergeRules([
                'admin_field' => ['sometimes', 'string', 'max:255'],
            ]);
        } else if ($userType === 'student') {
            $validator->mergeRules([
                'photo'=> 'required',
                'phone'=> 'required',
                'dob' => 'required',
                'gender' => 'required',
            ]);
        } else if ($userType === 'teacher') {
            $validator->mergeRules([
                'teacher_field' => ['sometimes', 'string', 'max:255'],
            ]);
        }
    
        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data = [])
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // $userType = $data['user_type'];

        // if ($userType === 'admin') {
        //     $data['admin_field'] = $data['admin_field'] ?? null;
        // } else if ($userType === 'student') {
        //     $data['photo'] = $data['photo'] ?? null;
        //     $data['dob'] = $data['dob'] ?? null;
        //     $data['gender'] = $data['gender'] ?? null;
        // } else if ($userType === 'teacher') {
        //     $data['teacher_field'] = $data['teacher_field'] ?? null;
        // }

        // if (isset($data['user_type'])) {
        //     $data['user_type'] = ucfirst($data['user_type']);
        // }

        // return static::query()->create($data);
    }

    /**
     * Show the student registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showStudentRegistrationForm()
    {
        return view('auth.register_student');
    }

    /**
     * Create a new student instance after a valid registration.
     
     */
    public function registerStudent(Request $request)
    {
        $userRules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'user_type' => ['required', 'string', Rule::in(['admin', 'student', 'teacher'])],
        ];
    
        $studentRules = [
            'photo'=> 'required',
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
            return redirect('register/student')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = new User([
            'name' => $request->input('student.name'),
            'email' => $request->input('student.email'),
            'password' => Hash::make($request->input('student.password')),
            'user_type' => 'student',
        ]);
    
        $user->save();
    
        $student = new Student([
            'photo' => $request->input('student.photo'),
            'phone' => $request->input('student.phone'),
            'dob' => $request->input('student.dob'),
            'gender' => $request->input('student.gender'),
        ]);
    
        $user->student()->save($student);
    
        return redirect('/')->with('success', 'You have been registered as a student!');
    }


    /**
     * Show the teacher registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showTeacherRegistrationForm()
    {
        $languages = Language::all();
        $levels = Level::all();
        return view('auth.register_teacher',compact('languages', 'levels'));
    }

    /**
     * Create a new student instance after a valid registration.
     
     */
    public function registerTeacher(Request $request)
    {
        $userRules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'user_type' => ['required', 'string', Rule::in(['admin', 'student', 'teacher'])],
        ];
    
        $teacherRules = [
            'photo'=> 'required',
            'phone'=> 'required',
            'dob' => 'required',
            'gender' => 'required',
            'education' => ['required', 'string', Rule::in(['undergraduate', 'graduated', 'master'])],
            'cv_form' => 'required',
            'reason' => 'required',
        ];

        $teacherData = $request->input('teacher') ? $request->input('teacher') : [];

        $validator = Validator::make(
            array_merge($request->all(), $teacherData),
            array_merge($userRules, $teacherRules)
        );
    
        if ($validator->fails()) {
            return redirect('register/teacher')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = new User([
            'name' => $request->input('teacher.name'),
            'email' => $request->input('teacher.email'),
            'password' => Hash::make($request->input('teacher.password')),
            'user_type' => 'teacher',
        ]);
    
        $user->save();
    
        $teacher = new Teacher([
            'photo' => $request->input('teacher.photo'),
            'phone' => $request->input('teacher.phone'),
            'dob' => $request->input('teacher.dob'),
            'gender' => $request->input('teacher.gender'),
            'education' => $request->input('teacher.education'),
            'cv_form' => $request->input('teacher.cv_form'),
            'reason' => $request->input('teacher.reason'),
        ]);
    
        $user->teacher()->save($teacher);

        $levels = $request->input('teacher.level');
        $teacher->teacher_levels()->sync($levels);
        // foreach ($levels as $lel) {
        //     $teacher->teacher_levels()->createMany([
        //         ['teacher_id' => $teacher->id, 'level_id' => $lel],
        //     ]);
        // }

        $certificates = $request->input('teacher.certificates');
        foreach ($certificates as $certi) {
            $teacher->teacher_certificates()->createMany([
                ['teacher_id' => $teacher->id, 'certi_img' => $certi],
            ]);
        }
    
        return redirect('/')->with('success', 'You have been registered as a teacher!');
    }


    public function getLevels($id)
    {
        $teach_levels = Level::where('language_id', $id)->pluck('level_name', 'id');
        return response()->json($teach_levels);
    }

}
