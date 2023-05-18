<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
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
        $languages = Language::orderByDesc('id')->get();
        $levels = Level::all();
        return view('admin.language.show',compact('languages', 'levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.language.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'language_name' => 'required|unique:languages|max:100',
            'level_name.*' => 'required_without_all:level_name.*',
        ]);
        // Language::create($language);

        $language = new Language();
        $language->language_name = $request->input('language_name');
        $language->save();

        $levelNames = $request->input('level_name');
        foreach ($levelNames as $ln) {
            $language->levels()->createMany([
                ['level_name' => $ln, 'language_id' => $language->id],
            ]);
        }

        return redirect()->route('language.index')->with('success', 'Course created successfully.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $language= Language::find($id);
        $levels = Level::where('language_id', $id)->get();
        return view('admin.language.edit',compact('language', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
        $language= Language::find($id);
        $language->language_name=request('language_name');
        $language->save();

        $levelNames = $request->input('level_name');
        foreach ($levelNames as $ln) {
            $level = Level::updateOrInsert(
                ['level_name' => $ln, 'language_id' => $language->id], 
                ['level_name' => $ln, 'language_id' => $language->id]
            );
        }

        
        

        return redirect()->route('language.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $language= Language::find($id);
        $language->delete();
        return redirect()->route('language.index')
        ->withSuccess('status','language delete successfully.');
    }
}
