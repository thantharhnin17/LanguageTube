<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BatchController extends Controller
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
        $batches = Batch::all();
        return view('admin.batch.show',compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.batch.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'batch_name' => 'required|unique:batches|max:100',
        ]);

        $batch = new Batch();
        $batch->batch_name = $request->input('batch_name');
        $batch->save();

        return redirect()->route('batch.index')->with('success', 'Batch created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $batch= Batch::find($id);
        return view('admin.batch.edit',compact('batch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'batch_name' => 'required|unique:batches|max:100',
        ]);

        $batch= Batch::find($id);
        $batch->batch_name=request('batch_name');
        $batch->save();

        return redirect()->route('batch.index')
        ->withSuccess('status','batch delete successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $batch= Batch::find($id);
        $batch->delete();
        return redirect()->route('batch.index')->with('success_message','Batch has been deleted');
        // return redirect('/batch')->with('success_message', 'Batch created successfully');
    }
}
