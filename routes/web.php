<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RecruitController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentMethodController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main.home');
});
Route::resource('/', HomeController::class);

Route::get('/recruits', [RecruitController::class, 'getRecruits']);
Route::get('/recruits/recruit_details/{id}',[RecruitController::class, 'recruit_details']);
Route::get('/recruits/recruit_details/{id}/recruit_form/',[RecruitController::class, 'recruit_form']);
//////////Teacher Apply////////////
Route::put('/recruits/recruit_details/{id}/recruit_form/', [TeacherController::class, 'apply'])->name('apply.teacher.submit');

//////////Home////////////
// Route::get('/', function () {
//     return view('home');
// });
// Route::get('/', [HomeController::class, 'index']);

//////////Classroom////////////
Route::get('/classrooms', [ClassroomController::class, 'getClassrooms']);
Route::get('/classrooms/classroom_details/{id}',[ClassroomController::class, 'classroom_details']);
Route::get('/classrooms/classroom_details/{id}/class_form',[ClassroomController::class, 'class_form']);
Route::post('/classrooms/classroom_details/{id}/class_form',[ClassroomController::class, 'purchase'])->name('classroom.purchase');

//////////Course////////////
Route::resource('about', AboutController::class);

//////////Course////////////
Route::resource('contact', ContactController::class);

//////////Profile////////////
Route::get('/profile/{id}', [UserController::class, 'show'])->name('user.profile');
Route::get('/profile/{id}/profile_classroom/{class_id}', [UserController::class, 'getClassroom'])->name('user.profile.classroom');
Route::put('/profile/{id}', [UserController::class, 'profileUpdate'])->name('user.profile.update');
Route::put('/profile/{id}/update-password', [UserController::class, 'updatePassword'])
    ->name('user.profile.updatePassword');
// Route::get('recruit/{id}/applicants/{app_id}',[RecruitController::class, 'process'])->name('recruit.process');

//////////Login////////////
// Route::get('/register', function () {
//         return view('register');
//     });
// Route::get('/register/admin', 'Auth\RegisterController@showAdminRegistrationForm')->name('register.admin');
// Route::post('/register/admin', 'Auth\RegisterController@registerAdmin')->name('register.admin.submit');

// // 'Auth\RegisterController@showStudentRegistrationForm'
// Route::get('/register/student', [RegisterController::class, 'showStudentRegistrationForm'])->name('register.student');
// Route::post('/register/student', [RegisterController::class, 'registerStudent'])->name('register.student.submit');

// Route::get('/register/teacher', [RegisterController::class, 'showTeacherRegistrationForm'])->name('register.teacher');
// Route::get('/register/teacher/get-teach-levels/{id}',[RegisterController::class, 'getLevels']);
// Route::post('/register/teacher', [RegisterController::class, 'registerTeacher'])->name('register.teacher.submit');


//////////Backend/////////////

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){

    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    //////////Language////////////
    Route::resource('language', LanguageController::class);
    // Route::get('language/create',[LanguageController::class, 'create']);
    // Route::post('languages/store',[LanguageController::class, 'create'])->name('language.store');

    //////////Level////////////
    Route::resource('Level', LevelController::class);


     /////////Course////////////
    Route::resource('course', CourseController::class);
    Route::get('course/get-course-levels/{id}',[CourseController::class, 'getLevels']);


    //////////Batch////////////
    Route::resource('batch', BatchController::class);

    //////////recruit////////////
    Route::resource('recruit', RecruitController::class);
    Route::post('recruit/status/{id}',[RecruitController::class, 'updateStatus'])->name('recruit.status');
    Route::get('recruit/{id}/applicants',[RecruitController::class, 'getapplicants'])->name('recruit.applicant');
    Route::get('recruit/{id}/applicants/{app_id}',[RecruitController::class, 'getoneapplicant'])->name('recruit.oneapplicant');
    Route::post('recruit/{id}/applicants/{app_id}',[RecruitController::class, 'process'])->name('recruit.process');

    //////////Classroom////////////
    Route::resource('classroom', ClassroomController::class);
    Route::post('classroom/get-teachers',[ClassroomController::class, 'getTeachers']);
    Route::post('classroom/status/{id}',[ClassroomController::class, 'updateStatus'])->name('classroom.status');
    Route::get('classroom/{id}/students',[ClassroomController::class, 'getStudents'])->name('classroom.student');
    Route::get('classroom/{id}/students/{stu_id}',[ClassroomController::class, 'getonestudent'])->name('classroom.onestudent');
    Route::post('classroom/{id}/students/{stu_id}',[ClassroomController::class, 'process'])->name('classroom.process');

    //////////Payment////////////
    Route::resource('payment', PaymentMethodController::class);
    

    //////////User////////////
    Route::resource('user', UserController::class);
    Route::get('user/get-levels/{id}',[CourseController::class, 'getLevels']);

    //////////Student////////////
    Route::resource('student', StudentController::class);

    //////////Teacher////////////
    Route::resource('teacher', TeacherController::class);
    Route::get('teacher/get-levels/{id}',[TeacherController::class, 'getLevels']);
    // Route::get('teacher/teacher/{id}/edit/get-levels/{id}',[TeacherController::class, 'getLevels']);

});

//////////Backend/////////////


