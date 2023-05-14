<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classroom;
use Illuminate\Http\Request;

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
        $users = User::all();
        $classrooms = Classroom::all();

        // Get the count of users
        $userCount = User::count();

        // Get the count of classrooms
        $classroomCount = Classroom::count();

        // return view('admin.user.show',compact('users','classrooms'));
        return view('admin.home', compact('userCount','classroomCount'));
    }
}
