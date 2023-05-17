<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Course;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
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
        $courses = Course::orderByDesc('id')->get();
        $languages = Language::all();
        $levels = Level::all();
        return view('admin.course.show',compact('courses','languages', 'levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        $levels = Level::all();
        return view('admin.course.create',compact('languages', 'levels'));
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
            'course_language' => 'required',
            'course_level' => 'required|unique:courses,level_id',
            'summary'=> 'required',
            'description'=> 'required',
            'course_img' => 'required'
        ]);
        
        if ($request->hasFile('course_img')) 
        {
            if ($request->file('course_img')->isValid()) 
            {
                $validated = $request->validate([
                    'course_img' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ]);
                $extension = $request->course_img->extension();
                $randomName = rand().".".$extension;
                $request->course_img->storeAs('/public/img/',$randomName);
                
            }
        }

            $course = new Course();

            $language_id = $request->input('course_language');
            $level_id = $request->input('course_level');

            $language = Language::find($language_id)->language_name;
            $level = Level::find($level_id)->level_name;

            $course->course_name = $language . '-' . $level;

            // $course->course_name = $request->input('course_language') . '-' . $request->input('course_level');
            $course->summary = $request->input('summary');
            $course->description = $request->input('description');
            $course->level_id = $level_id;
            $course->course_img = $randomName;
            $course->save();

            return redirect()->route('course.index')->with('success_message', 'Course created successfully.');
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
        $course = Course::find($id);
        $languages= Language::all();
        $levels = Level::all();
        return view('admin.course.edit',compact('course','languages', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'summary'=> 'required',
            'description'=> 'required'
        ]);

        $course = Course::find($id);
        if ($request->hasFile('course_img')) 
        {
            if ($request->file('course_img')->isValid()) 
            {
                $validated = $request->validate([
                    'course_img' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ]);
                $extension = $request->course_img->extension();
                $randomName = rand().".".$extension;
                $request->course_img->storeAs('/public/img/',$randomName);
                    $course->course_img = $randomName;
            }
        }   
        else{
            $course->course_img = $course->course_img;
        }

        // $language_id = $request->input('course_language_hidden');
        // $level_id = $request->input('course_level_hidden');

        // $language = Language::find($language_id)->language_name;
        // $level = Level::find($level_id)->level_name;

        // $course->course_name = $language . '-' . $level;

            // $course->course_name = $request->input('course_language') . '-' . $request->input('course_level');
            $course->summary = $request->input('summary');
            $course->description = $request->input('description');
            // $course->level_id = $request->input('course_level');
         
           $course->save();
           return redirect()->route('course.index')
            ->with('success_message', 'Course update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course= Course::find($id);
        $course->delete();
        return redirect()->route('course.index')
        ->with('success_message','course delete successfully.');
    }
}
