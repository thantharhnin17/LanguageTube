<?php

namespace App\Http\Controllers;

use App\Models\Recruit;
use App\Models\Language;
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
        $languages = Language::all();
        return view('admin.recruit.create',compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('recruit_img')) 
        {
            if ($request->file('recruit_img')->isValid()) 
            {
                $validated = $request->validate([
                    'recruit_img' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ]);
                $extension = $request->recruit_img->extension();
                $randomName = rand().".".$extension;
                $request->recruit_img->storeAs('/public/img/',$randomName);
                
            }
        }
         $request->validate([
                'user'=> 'required',
                'title'=> 'required',
                'language'=> 'required',
                'type' => 'required',
                'salary' => 'required',
                'total_person' => 'required',
                'description'=> 'required',
                'requirement' => 'required',
                'recruit_img' => 'required',
            ]);

            $recruit = new Recruit();
            $recruit->user_id = $request->input('user');
            $recruit->title = $request->input('title');
            $recruit->language_id = $request->input('language');
            $recruit->type = $request->input('type');
            $recruit->salary = $request->input('salary');
            $recruit->total_person = $request->input('total_person');
            $recruit->description = $request->input('description');
            $recruit->requirement = $request->input('requirement');
            $recruit->recruit_img = $randomName;
            $recruit->save();

            return redirect()->route('recruit.index')->with('success_message', 'Recruitment created successfully.');
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
    public function edit(string $id)
    {
        $recruit = Recruit::find($id);
        $languages = Language::all();
        return view('admin.recruit.edit',compact('recruit','languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user'=> 'required',
                'title'=> 'required',
                'language'=> 'required',
                'type' => 'required',
                'salary' => 'required',
                'total_person' => 'required',
                'description'=> 'required',
                'requirement' => 'required',
        ]);

        $recruit = Recruit::find($id);
        if ($request->hasFile('recruit_img')) 
        {
            if ($request->file('recruit_img')->isValid()) 
            {
                $validated = $request->validate([
                    'recruit_img' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ]);
                $extension = $request->recruit_img->extension();
                $randomName = rand().".".$extension;
                $request->recruit_img->storeAs('/public/img/',$randomName);
                    $recruit->recruit_img = $randomName;
            }
        }   
        else{
            $recruit->recruit_img = $recruit->recruit_img;
        }
            $recruit->user_id = $request->input('user');
            $recruit->title = $request->input('title');
            $recruit->language_id = $request->input('language');
            $recruit->type = $request->input('type');
            $recruit->salary = $request->input('salary');
            $recruit->total_person = $request->input('total_person');
            $recruit->description = $request->input('description');
            $recruit->requirement = $request->input('requirement');
         
           $recruit->save();
           return redirect()->route('recruit.index')
            ->with('success_message', 'Recruitment update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recruit= Recruit::find($id);
        $recruit->delete();
        return redirect()->route('recruit.index')
        ->with('success_message','Recruitment delete successfully.');
    }
}
