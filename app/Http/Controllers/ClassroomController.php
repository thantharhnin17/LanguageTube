<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Classroom;
use App\Models\OnlineInfo;
use App\Models\TeacherLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::all();
        $courses = Course::all();
        $batches = Batch::all();
        $teachers = Teacher::all();
        return view('admin.classroom.show',compact('classrooms', 'courses' ,'batches', 'teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = Classroom::all();
        $courses = Course::all();
        $batches = Batch::all();
        $teachers = Teacher::all();
        return view('admin.classroom.create',compact('classrooms', 'courses' ,'batches', 'teachers'));
    }

    public function getTeachers($id)
    {
        $course = Course::find($id);
        $level_id = $course->level_id;
        $teachers = TeacherLevel::where('level_id', $level_id)->pluck('teacher_id');
        $course_teacher_id = Teacher::whereIn('id', $teachers)->pluck('user_id');
        $course_teachers = User::whereIn('id', $course_teacher_id)->pluck('name','id');
        
        return response()->json($course_teachers);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_name'=> 'required',
            'course_teacher' => 'required',
            'batch_name' => 'required',
            'duration'=> 'required',
            'start_date' => 'required',
            'days' => 'required',
            'time' => 'required',
            'avaliable_students' => 'required',
            'fee' => 'required',
            'class_type' => 'required',
            'meeting_link' => 'required_if:class_type,1',
            'group_chat_link' => 'required_if:class_type,1',
        ]);

        $classroom = new Classroom();
        $classroom->course_id = $request->input('course_name');
        $classroom->teacher_id = $request->input('course_teacher');
        $classroom->batch_id = $request->input('batch_name');
        $classroom->duration = $request->input('duration');
        $classroom->start_date = $request->input('start_date');
        $classroom->days = $request->input('days');
        $classroom->time = $request->input('time');
        $classroom->avaliable_students = $request->input('avaliable_students');
        $classroom->fee = $request->input('fee');
        $classroom->class_type = $request->input('class_type');

        if($classroom->class_type == 1){
            $online_info = new OnlineInfo();
            $online_info->meeting_link = $request->input('meeting_link');
            $online_info->group_chat_link = $request->input('group_chat_link');

            $online_info->save();

            $classroom->online_info_id = $online_info->id;
        }

        $classroom->save();

        return redirect()->route('classroom.index')->with('success_message', 'Classroom created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classroom $classroom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        //
    }
}
