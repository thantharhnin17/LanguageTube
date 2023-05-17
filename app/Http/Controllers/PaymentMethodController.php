<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = PaymentMethod::orderByDesc('id')->get();
        return view('admin.payment.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $payers = ['KBZ Pay', 'Wave Pay','CB Pay', 'AYA Pay'];
        return view('admin.payment.create',compact('payers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'payName'=> 'required',
            'accName' => 'required',
            'accNo' => 'required',
            'logo'=> 'required',
        ]);
        
        if ($request->hasFile('logo')) 
        {
            if ($request->file('logo')->isValid()) 
            {
                $validated = $request->validate([
                    'logo' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ]);
                $extension = $request->logo->extension();
                $randomName = rand().".".$extension;
                $request->logo->storeAs('/public/img/',$randomName);
                
            }
        }

            $payment = new PaymentMethod();
            $payment->payName = $request->input('payName');
            $payment->accName = $request->input('accName');
            $payment->accNo = $request->input('accNo');
            $payment->logo = $randomName;
            $payment->save();

            return redirect()->route('payment.index')->with('success_message', 'Payment Method created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = PaymentMethod::find($id);
        $payers = ['KBZ Pay', 'Wave Pay','CB Pay', 'AYA Pay'];
        return view('admin.payment.edit',compact('payment', 'payers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'payName'=> 'required',
            'accName' => 'required',
            'accNo' => 'required',
        ]);

        $payment = PaymentMethod::find($id);
        if ($request->hasFile('logo')) 
        {
            if ($request->file('logo')->isValid()) 
            {
                $validated = $request->validate([
                    'logo' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ]);
                $extension = $request->logo->extension();
                $randomName = rand().".".$extension;
                $request->logo->storeAs('/public/img/',$randomName);
                    $payment->logo = $randomName;
            }
        }   
        else{
            $payment->logo = $payment->logo;
        }
            $payment->payName = $request->input('payName');
            $payment->accName = $request->input('accName');
            $payment->accNo = $request->input('accNo');
         
           $payment->save();
           return redirect()->route('payment.index')
            ->with('success_message', 'Payment update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = PaymentMethod::find($id);
        $logo = $payment->logo;

        $path = "public/img/{$logo}";

        if(Storage::exists($path)) {
            Storage::delete($path);
        }

        $payment->delete();

        return redirect()->route('payment.index')
        ->with('success_message','Payment delete successfully.');
    }
}
