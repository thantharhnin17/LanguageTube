<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Recruit;
use App\Models\Language;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Count
        $users = User::all();
        $classrooms = Classroom::all();
        $recruit = Recruit::all();
        $allFee = 0;

        foreach ($classrooms as $classroom) {
            $allFee += $classroom->fee;
        }

        $allFeeStr = (string) $allFee; // Convert number to string
        $zeroCount = substr_count($allFeeStr, '0'); // Count the number of zeros
        if ($zeroCount > 4) {
            $formattedFee = number_format($allFee/1000, 1); // Divide by 1000 and add 'k'
        } else {
            $formattedFee = number_format($allFee); // Format the number with commas
        }

        $integerFee = (int) $formattedFee; // Convert to integer

        // Get the count of users
        $userCount = User::count();

        // Get the count of classrooms
        $classroomCount = Classroom::count();

        // Get the count of recruit
        $recruitCount = Recruit::count();


         // Chart
        // $languages = Language::all();

        $languageWithMostStudents = Language::selectRaw('languages.*, (SELECT COUNT(*) FROM classroom_students
                            INNER JOIN classrooms ON classroom_students.classroom_id = classrooms.id
                            INNER JOIN courses ON classrooms.course_id = courses.id
                            INNER JOIN levels ON courses.level_id = levels.id
                            WHERE levels.language_id = languages.id) as student_count')
        ->orderBy('student_count', 'desc')
        ->get();

        $courseWithMostStudents = Course::selectRaw('courses.course_name, COUNT(*) as student_count')
        ->join('classrooms', 'classrooms.course_id', '=', 'courses.id')
        ->join('classroom_students', 'classroom_students.classroom_id', '=', 'classrooms.id')
        ->groupBy('courses.course_name')
        ->orderBy('student_count', 'desc')
        ->get();

        // // Retrieve the enrollment data from the database
        // $enrollmentData = DB::table('classrooms')
        // ->join('classroom_students', 'classrooms.id', '=', 'classroom_students.classroom_id')
        // ->select('classrooms.id', 'classrooms.course_id', 'classrooms.batch_id', 'classrooms.duration', 'classrooms.start_date', 'classrooms.avaliable_students', 'classrooms.fee', 'classroom_students.user_id')
        // ->get();

        // // Process the retrieved data to prepare it for the chart
        // $processedData = [];
        // foreach ($enrollmentData as $entry) {
        // $classroom = Classroom::find($entry->id);
        // $course = Course::find($entry->course_id);
        // $batch = Batch::find($entry->batch_id);
        // $user = User::find($entry->user_id);

        // $processedData[] = [
        //     'course' => $course->course_name,
        //     'batch' => $batch->batch_name,
        //     'user' => $user->name,
        //     'enrollment' => $entry->avaliable_students,
        // ];
        // }
        
        // $enrollmentData = ['enrollmentData' => $processedData];

        // dd($courseWithMostStudents);

        // return view('admin.user.show',compact('users','classrooms'));
        return view('admin.home', compact('integerFee','classroomCount','recruitCount','userCount','languageWithMostStudents', 'courseWithMostStudents'));
    }
}
