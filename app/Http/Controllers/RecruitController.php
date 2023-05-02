<?php

namespace App\Http\Controllers;

use App\Models\Recruit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecruitController extends Controller
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
        $recruits = Recruit::all();
        return view('admin.recruit.show',compact('recruits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RecruitPosts $recruitPosts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RecruitPosts $recruitPosts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RecruitPosts $recruitPosts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecruitPosts $recruitPosts)
    {
        //
    }
}
