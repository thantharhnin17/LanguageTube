<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use App\Models\Recruit;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Language;
use App\Models\TeacherLevel;
use Illuminate\Http\Request;
use App\Models\TeacherCertificate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('user_type', 'teacher')->orderByDesc('id')->get();
        // $students = Student::all();
        return view('admin.teacher.show',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        return view('admin.teacher.create',compact('languages'));
    }

    public function getLevels($id)
    {
        $course_levels = Level::where('language_id', $id)->pluck('level_name', 'id');
        return response()->json($course_levels);
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
                'type' => 'required',
                'time' => 'required',
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

            $user = User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => Hash::make(request('password')),
                'photo' => $randomName,
                'phone' => request('phone'),
                'dob' => request('dob'),
                'gender' => request('gender'),
                'user_type' => 'teacher',
            ]);

            $teacher = new Teacher();
            
            $teacher->user_id = $user->id;
            $teacher->type = request('type');
            $teacher->time = request('time');
            $teacher->recruit_id = null;
            $teacher->education = null;
            $teacher->university = null;
            $teacher->cv_form = null;
            $teacher->comment = null;
            $teacher->status = 'Accepted';
            $teacher->save();

            $levels = $request->input('levels');
            $levelData = [];
            foreach ($levels as $level) {
                $levelData[] = [
                    'teacher_id' => $teacher->id,
                    'level_id' => $level
                ];
            }
            TeacherLevel::insert($levelData);

            return redirect()->route('teacher.index')->with('success_message', 'Teacher created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user= User::find($id);
        $teacher = $user->teacher;
        $languages= Language::all();
        $levels = Level::all();
        return view('admin.teacher.edit',compact('user','teacher','languages', 'levels'));
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
            'type' => 'required',
            'time' => 'required',
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


            $teacher = $user->teacher;
            $teacher->user_id = $user->id;
            $teacher->type = request('type');
            $teacher->time = request('time');
            $teacher->recruit_id = null;
            $teacher->education = null;
            $teacher->university = null;
            $teacher->cv_form = null;
            $teacher->comment = null;
            $teacher->status = 'Accepted';
            $teacher->save();

            $levels = $request->input('levels');
            $levelData = [];
                foreach ($levels as $level) {
                    $levelData[] = [
                        'teacher_id' => $teacher->id,
                        'level_id' => $level
                    ];
                }
            TeacherLevel::insert($levelData);

           return redirect()->route('teacher.index')
            ->with('success_message', 'Teacher update successfully.');
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

        return redirect()->route('teacher.index')
        ->with('success_message','Teacher delete successfully.');
    }


    /**
     * apply job
     */
    public function apply(Request $request,string $id)
    {
        $user = User::find($id);
        $recruit_id = $request->input('recruit_id');
        $type = $request->input('type');
        $time = $request->input('time');

        // Check if the teacher has already applied for the given recruitment
        $existingApplication = Teacher::where('recruit_id', $recruit_id)
        ->where('user_id', $user->id)
        ->first();

        if ($existingApplication) {
            return view('main.recruit_form_complete')->with(['error_message' => 'You have already applied for this job']);
        } else {
            

    //////////


        // $user = User::find($user_id);
        if ($request->hasFile('photo')) 
        {
            if ($request->file('photo')->isValid()) 
            {
                $validated = $request->validate([
                    'photo' => 'mimes:jpg,jpeg,png,gif',
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

        $user->name = request('name');
        $user->email = request('email');
        $user->phone = request('phone');
        $user->dob = request('dob');
        $user->gender = request('gender');
         
        $user->save();
        /////////////

        if ($request->hasFile('cv_form')) 
        {
            if ($request->file('cv_form')->isValid()) 
            {
                $validated = $request->validate([
                    'cvform' => 'mimes:doc,docx,pdf|max:5120',
                ]);
                $extension = $request->cv_form->extension();
                $randomCV = rand().".".$extension;
                $request->cv_form->storeAs('/public/img/',$randomCV);
                
            }
        }

        $teacher = new Teacher();
        $teacher->user_id = $user->id;
        $teacher->type = $type;
        $teacher->time = $time;
        $teacher->recruit_id = $recruit_id;
        $teacher->education = $request->input('education');
        $teacher->university = $request->input('university');
        $teacher->cv_form = $randomCV;
        $teacher->comment = $request->input('comment');
        $teacher->save();


        ///////////////

        

        $levels = $request->input('levels');
        $levelData = [];
        foreach ($levels as $level) {
            $levelData[] = [
                'teacher_id' => $teacher->id,
                'level_id' => $level
            ];
        }
        TeacherLevel::insert($levelData);

        ///////////////

        $certis = $request->file('certis');

        foreach ($certis as $certi) {
            $extension = $certi->extension();
            $randomCerti = rand() . "." . $extension;
            $certi->storeAs('/public/img/', $randomCerti);

            $teacher->teacher_certificates()->createMany([
                ['teacher_id' => $teacher->id, 'certi_img' => $randomCerti],
            ]);
        }


        return view('main.recruit_form_complete')->with(['success_message' => 'You apply successfully. We will inform you soon']);
    }
}

}