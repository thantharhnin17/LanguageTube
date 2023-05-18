<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Teacher;
use App\Models\Language;
use App\Models\Classroom;
use App\Models\OnlineInfo;
use App\Models\TeacherLevel;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\PaymentConfirm;
use App\Models\ClassroomStudent;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::orderByDesc('id')->get();
        $courses = Course::all();
        $batches = Batch::all();
        $users = User::where('user_type', 'teacher')->get();

        foreach($classrooms as $classroom){
            if($classroom->avaliable_students == $classroom->accept_students){
                $classroom->status = 0;
                $classroom->save();
            }
        }

        return view('admin.classroom.index',compact('classrooms', 'courses' ,'batches', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = Classroom::all();
        $courses = Course::all();
        $batches = Batch::all();
        $users = User::where('user_type', 'teacher')->get();
        $weekdays = ['Mon', 'Tue','Wed', 'Thur', 'Fri','Sat', 'Sun'];
        return view('admin.classroom.create',compact('classrooms', 'courses' ,'batches', 'users', 'weekdays'));
    }

    public function getTeachers(Request $request)
    {
        $course_name = $request->input('course_name');
        $class_type = $request->input('class_type');
        $course = Course::find($course_name);
        $level_id = $course->level_id;
        $teachers = TeacherLevel::where('level_id', $level_id)->pluck('teacher_id');
        $course_teacher_id = Teacher::whereIn('id', $teachers)->where('type', $class_type)->pluck('user_id');
        $course_teachers = User::whereIn('id', $course_teacher_id)->where('user_type', 'teacher')->pluck('name','id');
        
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
            'from' => 'required',
            'to' => 'required',
            'avaliable_students' => 'required',
            'fee' => 'required',
            'class_type' => 'required',
            'meeting_link' => 'required_if:class_type,1',
            'group_chat_link' => 'required_if:class_type,1',
        ]);

        $classroom = new Classroom();
        $classroom->course_id = $request->input('course_name');
        $classroom->user_id = $request->input('course_teacher');
        $classroom->batch_id = $request->input('batch_name');
        $classroom->duration = $request->input('duration');
        $classroom->start_date = $request->input('start_date');
        $classroom->days = implode(",",request('days'));
        $classroom->from = $request->input('from');
        $classroom->to = $request->input('to');
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
    public function show(string $id)
    {
        $classroom = Classroom::find($id);
        $courses = Course::all();
        $batches = Batch::all();
        $users = User::where('user_type', 'teacher')->get();
        $weekdays = ['Mon', 'Tue','Wed', 'Thur', 'Fri','Sat', 'Sun'];
        return view('admin.classroom.show',compact('classroom', 'courses' ,'batches', 'users', 'weekdays'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classroom = Classroom::find($id);
        $courses = Course::all();
        $batches = Batch::all();
        $users = User::where('user_type', 'teacher')->get();
        $weekdays = ['Mon', 'Tue','Wed', 'Thur', 'Fri','Sat', 'Sun'];
        return view('admin.classroom.edit',compact('classroom', 'courses' ,'batches', 'users', 'weekdays'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'course_name'=> 'required',
            'course_teacher' => 'required',
            'batch_name' => 'required',
            'duration'=> 'required',
            'start_date' => 'required',
            'days' => 'required',
            'from' => 'required',
            'to' => 'required',
            'avaliable_students' => 'required',
            'fee' => 'required',
            'class_type' => 'required',
            'meeting_link' => 'required_if:class_type,1',
            'group_chat_link' => 'required_if:class_type,1',
        ]);

        $classroom = Classroom::find($id);
        $classroom->course_id = $request->input('course_name');
        $classroom->user_id = $request->input('course_teacher');
        $classroom->batch_id = $request->input('batch_name');
        $classroom->duration = $request->input('duration');
        $classroom->start_date = $request->input('start_date');
        $classroom->days = implode(",",request('days'));
        $classroom->from = $request->input('from');
        $classroom->to = $request->input('to');
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

        return redirect()->route('classroom.index')->with('success_message', 'Classroom updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $classroom= Classroom::find($id);
        $classroom->delete();
        return redirect()->route('classroom.index')
        ->with('success_message','Classroom delete successfully.');
    }


    /**
     * Update the status
     */
    public function updateStatus(Request $request, string $id)
    {

        $classroom = Classroom::find($id);
        if($request->input('status') == null){
            $classroom->status = 0; 
        }else{
            $classroom->status = 1; 
        }
        $classroom->save();
    }

    /**
     * get all classrooms
     */
    public function getClassrooms() {
        $classrooms=Classroom::where('status', 1)->orderBy('id','DESC')->get();
        $languages = Language::all();
        $courses = Course::all();
        $batches = Batch::all();
        $users = User::where('user_type', 'teacher')->get();
        return view('main.classroom',compact('classrooms','languages', 'courses' ,'batches', 'users'));
    }

    /**
     * Show Classroom Detail
     */
    public function classroom_details($id)
    {
        $classroom = Classroom::find($id);
        return view('main.classroom_details',compact('classroom'));
    }

    /**
     * Show Classroom Form
     */
    public function class_form($id)
    {
        $classroom = Classroom::find($id);
        $payments = PaymentMethod::all();
        return view('main.class_form',compact('classroom', 'payments'));
    }


    /**
     * Classroom Purchase by user
     */
    public function purchase(Request $request)
    {

        $classroomStudent = new ClassroomStudent();
        $classroomStudent->user_id = $request->input('user_id');
        $classroomStudent->classroom_id = $request->input('classroom_id');
        $classroomStudent->save();

        $request->validate([
            'payment_method_id'=> 'required',
            'payImg' => 'required',
        ]);

        if ($request->hasFile('payImg')) 
        {
            if ($request->file('payImg')->isValid()) 
            {
                $validated = $request->validate([
                    'payImg' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ]);
                $extension = $request->payImg->extension();
                $randomName = rand().".".$extension;
                $request->payImg->storeAs('/public/img/',$randomName);
                
            }
        }

        $payment = new Payment();
        $payment->classroom_student_id = $classroomStudent->id;
        $payment->payment_method_id = $request->input('payment_method_id');
        $payment->payImg = $randomName;
        $payment->save();

        $paymentConfirm = new PaymentConfirm();
        $paymentConfirm->payment_id = $payment->id;
        $paymentConfirm->user_id= null;
        $paymentConfirm->confirmStatus = 'Pending';
        $paymentConfirm->save();

        return view('main.class_form_complete')->with('success_message', 'Payment created successfully.');
 
    }


    /**
     * get all students by classroom
     */
    public function getStudents($id) {

        $classroom = Classroom::find($id);
        $students = $classroom->students->sortByDesc('id');
        $paymentConfirms = PaymentConfirm::all();
        
        return view('admin.classroom.student',compact('classroom','students', 'paymentConfirms'));
    }

     /**
     * get one student by classroom
     */
    public function getonestudent($id,$stu_id) {

        $classroom = Classroom::find($id);
        $student = User::find($stu_id);
        $payments = Payment::all();
        // $levels = $teacher->levels;
        return view('admin.classroom.oneStudent',compact('student','classroom','payments'));
    }

    /**
    * get one applicant by recruitment
    */
   public function process($id, $stu_id, Request $request)
   {
        $classroom = Classroom::findOrFail($id);

       $action = $request->input('action');
       $admin_id = $request->input('admin_id');

       $user = User::find($stu_id);

       $classroomStudentId = ClassroomStudent::where('user_id', $stu_id)->where('classroom_id', $id)->pluck('id')->first();

       $paymentId = Payment::where('classroom_student_id', $classroomStudentId)->pluck('id')->first();

       $paymentConfirm = PaymentConfirm::where('payment_id', $paymentId)->first();


       if ($action === 'accept') {
           $user->user_type = 'student';
           $user->save();

           $paymentConfirm->user_id = $admin_id;
           $paymentConfirm->confirmStatus = 'Accepted';
           $paymentConfirm->save();

           $classroom->accept_students += 1;
           $classroom->save();
            
       } elseif ($action === 'reject') {

           $user->user_type = 'user';
           $user->save();

           $paymentConfirm->user_id = $admin_id;
           $paymentConfirm->confirmStatus = 'Rejected';
           $paymentConfirm->save();

       } else {
           return back()->withInput();
       }
       

        
        $students = $classroom->students;
        $paymentConfirms = PaymentConfirm::all();
            
        return view('admin.classroom.student',compact('classroom','students', 'paymentConfirms'));
   }

}
