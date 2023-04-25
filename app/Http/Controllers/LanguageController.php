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
        $languages = Language::all();
        $levels = Level::all();
        return view('admin.language.show',compact('languages', 'levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $languages = Language::all();
        // $levels = Level::all();
        return view('admin.language.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $language = new Language();
        $language->name = $request->input('languagename');

        $language->save();
        //dd($language->id);

        // $level = new Level();
        // $level->name = $request->input('levelname');

        $levelNames = $request->input('levelname');
        foreach ($levelNames as $ln) {
            $level = new Level();
            $level->name = $ln;
            $level->language_id = $language->id;

            $level->save();
        }

        // $language->save();

        // level::insert([
        //     [
        //         'name' => $request->input('levelname'),
        //         'language_id' => $language->id,
        //     ]
        // ]);
        
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
