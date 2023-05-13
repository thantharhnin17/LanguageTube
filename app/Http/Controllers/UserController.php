<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Language;
use App\Models\TeacherLevel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        $users = User::where('user_type', 'user')->get();
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

    // public function getLevels($id)
    // {
    //     $course_levels = Level::where('language_id', $id)->pluck('level_name', 'id');
    //     return response()->json($course_levels);
    // }

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

            // if($user->user_type == "teacher"){
            //     $teacher = new Teacher();
            //     $teacher->user_id = $user->id;
            //     $teacher->recruit_id = null;
            //     $teacher->education = null;
            //     $teacher->university = null;
            //     $teacher->cv_form = null;
            //     $teacher->comment = null;
            //     $teacher->status = 'Accepted';
            //     $teacher->save();

            //     $levels = $request->input('levels');
            //     $levelData = [];
            //     foreach ($levels as $level) {
            //         $levelData[] = [
            //             'teacher_id' => $teacher->id,
            //             'level_id' => $level
            //         ];
            //     }
            //     TeacherLevel::insert($levelData);
            // }
            
            return redirect()->route('user.index')->with('success_message', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

            // if($user->user_type == "teacher"){
            //     $teacher = new Teacher();
            //     $teacher->user_id = $user->id;
            //     $teacher->recruit_id = null;
            //     $teacher->education = null;
            //     $teacher->university = null;
            //     $teacher->cv_form = null;
            //     $teacher->comment = null;
            //     $teacher->status = 'Accepted';
            //     $teacher->save();

            //     $levels = $request->input('levels');
            //     $levelData = [];
            //     foreach ($levels as $level) {
            //         $levelData[] = [
            //             'teacher_id' => $teacher->id,
            //             'level_id' => $level
            //         ];
            //     }
            //     TeacherLevel::insert($levelData);
            // }

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
}
