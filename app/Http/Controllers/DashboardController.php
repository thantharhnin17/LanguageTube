<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Recruit;
use App\Models\Teacher;
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
            $allFee += $classroom->fee * $classroom->accept_students;
        }


        $integerFee = number_format($allFee / 1000, 1);

        // Get the count of users
        $userCount = User::count();

        // Get the count of classrooms
        $classroomCount = Classroom::count();

        // Get the count of recruit
        $recruitCount = Recruit::count();


        $default_start_date = '2022-01-01';
        $default_end_date = '2023-12-31';


         // Chart
        $languageWithMostStudents = Language::selectRaw('languages.*, (SELECT COUNT(*) FROM classroom_students
                            INNER JOIN classrooms ON classroom_students.classroom_id = classrooms.id
                            INNER JOIN courses ON classrooms.course_id = courses.id
                            INNER JOIN levels ON courses.level_id = levels.id
                            WHERE levels.language_id = languages.id) as student_count')
        ->whereBetween('created_at', [$default_start_date, $default_end_date])
        ->orderBy('student_count', 'desc')
        ->get();

        $courseWithMostStudents = Course::selectRaw('courses.course_name, COUNT(*) as student_count')
        ->join('classrooms', 'classrooms.course_id', '=', 'courses.id')
        ->join('classroom_students', 'classroom_students.classroom_id', '=', 'classrooms.id')
        ->whereBetween('classrooms.created_at', [$default_start_date, $default_end_date])
        ->groupBy('courses.course_name')
        ->orderBy('student_count', 'desc')
        ->get();

        $teacherReports = Teacher::join('teacher_levels', 'teachers.id', '=', 'teacher_levels.teacher_id')
        ->join('levels', 'teacher_levels.level_id', '=', 'levels.id')
        ->join('languages', 'levels.language_id', '=', 'languages.id')
        ->selectRaw('languages.language_name, COUNT(DISTINCT teachers.id) as teacher_count')
        ->groupBy('languages.language_name')
        ->get();


        // dd($languageWithMostStudents);
        return view('admin.home', compact('integerFee','classroomCount','recruitCount','userCount','languageWithMostStudents', 'courseWithMostStudents','teacherReports'));
    }

    public function showMonthlyLanguage(Request $request)
    {
        
        $request->validate([
            'start_month'=>'required',
            'end_month'=>'required',
        ]);

        $default_start_date = '2022-01-01';
        $default_end_date = '2023-12-31';

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
        $languageWithMostStudents = Language::selectRaw('languages.*, (SELECT COUNT(*) FROM classroom_students
                                    INNER JOIN classrooms ON classroom_students.classroom_id = classrooms.id
                                    INNER JOIN courses ON classrooms.course_id = courses.id
                                    INNER JOIN levels ON courses.level_id = levels.id
                                    WHERE levels.language_id = languages.id) as student_count')
                                    ->whereBetween('created_at', [$default_start_date, $default_end_date])
                                    ->orderBy('student_count', 'desc')
                                    ->get();

        $courseWithMostStudents = Course::selectRaw('courses.course_name, COUNT(*) as student_count')
                                ->join('classrooms', 'classrooms.course_id', '=', 'courses.id')
                                ->join('classroom_students', 'classroom_students.classroom_id', '=', 'classrooms.id')
                                ->whereBetween('classrooms.created_at', [$default_start_date, $default_end_date])
                                ->groupBy('courses.course_name')
                                ->orderBy('student_count', 'desc')
                                ->get();

        $teacherReports = Teacher::join('teacher_levels', 'teachers.id', '=', 'teacher_levels.teacher_id')
                        ->join('levels', 'teacher_levels.level_id', '=', 'levels.id')
                        ->join('languages', 'levels.language_id', '=', 'languages.id')
                        ->selectRaw('languages.language_name, COUNT(DISTINCT teachers.id) as teacher_count')
                        ->groupBy('languages.language_name')
                        ->get();


        $start = Carbon::createFromFormat('Y-m', $request->start_month)->firstOfMonth();
        $start_date = $start->format('Y-m-d');
        

        $end = Carbon::createFromFormat('Y-m', $request->end_month)->lastOfMonth();
        $end_date = $end->format('Y-m-d');

        $monthlyLanguageWithMostStudents = Language::selectRaw('languages.*, (SELECT COUNT(*) FROM classroom_students
                            INNER JOIN classrooms ON classroom_students.classroom_id = classrooms.id
                            INNER JOIN courses ON classrooms.course_id = courses.id
                            INNER JOIN levels ON courses.level_id = levels.id
                            WHERE levels.language_id = languages.id) as student_count')
                            ->whereBetween('created_at', [$start_date, $end_date])
                            ->orderBy('student_count', 'desc')
                            ->get();


        if(count($monthlyLanguageWithMostStudents) == 0){
            return view('admin.home', compact('integerFee','classroomCount','recruitCount','userCount','languageWithMostStudents', 'courseWithMostStudents','teacherReports'));
        }else{
            $languageWithMostStudents = $monthlyLanguageWithMostStudents;

            return view('admin.home', compact('integerFee','classroomCount','recruitCount','userCount','languageWithMostStudents', 'courseWithMostStudents','teacherReports'));
        }
        
    }

    public function showMonthlyStudent(Request $request)
    {
        
        $request->validate([
            'start_month'=>'required',
            'end_month'=>'required',
        ]);

        $default_start_date = '2022-01-01';
        $default_end_date = '2023-12-31';

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
        $languageWithMostStudents = Language::selectRaw('languages.*, (SELECT COUNT(*) FROM classroom_students
                                    INNER JOIN classrooms ON classroom_students.classroom_id = classrooms.id
                                    INNER JOIN courses ON classrooms.course_id = courses.id
                                    INNER JOIN levels ON courses.level_id = levels.id
                                    WHERE levels.language_id = languages.id) as student_count')
                                    ->whereBetween('created_at', [$default_start_date, $default_end_date])
                                    ->orderBy('student_count', 'desc')
                                    ->get();

        $courseWithMostStudents = Course::selectRaw('courses.course_name, COUNT(*) as student_count')
                                ->join('classrooms', 'classrooms.course_id', '=', 'courses.id')
                                ->join('classroom_students', 'classroom_students.classroom_id', '=', 'classrooms.id')
                                ->whereBetween('classrooms.created_at', [$default_start_date, $default_end_date])
                                ->groupBy('courses.course_name')
                                ->orderBy('student_count', 'desc')
                                ->get();

        $teacherReports = Teacher::join('teacher_levels', 'teachers.id', '=', 'teacher_levels.teacher_id')
                        ->join('levels', 'teacher_levels.level_id', '=', 'levels.id')
                        ->join('languages', 'levels.language_id', '=', 'languages.id')
                        ->selectRaw('languages.language_name, COUNT(DISTINCT teachers.id) as teacher_count')
                        ->groupBy('languages.language_name')
                        ->get();


        $start = Carbon::createFromFormat('Y-m', $request->start_month)->firstOfMonth();
        $start_date = $start->format('Y-m-d');
        

        $end = Carbon::createFromFormat('Y-m', $request->end_month)->lastOfMonth();
        $end_date = $end->format('Y-m-d');

        $monthlyCourseWithMostStudents = Course::selectRaw('courses.course_name, COUNT(*) as student_count')
                                ->join('classrooms', 'classrooms.course_id', '=', 'courses.id')
                                ->join('classroom_students', 'classroom_students.classroom_id', '=', 'classrooms.id')
                                ->whereBetween('classrooms.created_at', [$start_date, $end_date])
                                ->groupBy('courses.course_name')
                                ->orderBy('student_count', 'desc')
                                ->get();


        

        if(count($monthlyCourseWithMostStudents) == 0){
            return view('admin.home', compact('integerFee','classroomCount','recruitCount','userCount','languageWithMostStudents', 'courseWithMostStudents','teacherReports'));
        }else{
            $courseWithMostStudents = $monthlyCourseWithMostStudents;
            return view('admin.home', compact('integerFee','classroomCount','recruitCount','userCount','languageWithMostStudents', 'courseWithMostStudents','teacherReports'));
        }
        
    }
}
