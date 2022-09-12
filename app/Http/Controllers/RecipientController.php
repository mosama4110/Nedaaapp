<?php

namespace App\Http\Controllers;

use App\Models\recipients;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class RecipientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipient= recipients::all();
        return view('recipient.recipient',compact('recipient'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
        'recipient_name' => 'required|max:255|unique:recipients',
        ],[
        'recipient_name.required' =>'يرجى إدخال المرحلة التعليمية',
        'recipient_name.unique' =>'المرحلة التعليمية مسجل مسبقا',
    ]);
        recipients::create([
            'recipient_name' => $request->recipient_name,
            'description' => $request->description,
            'Created_by' => Auth::user()->name ,
        ]);
        session()->flash('Add', 'تم اضافة المرحلة التعليمية بنجاح ');
        return redirect('/recipient');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function show(recipient $recipient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function edit(recipient $recipient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [

            'recipient_name' => 'required|max:255|unique:recipients,recipient_name,'.$id,
            ],[

            'recipient_name.required' =>'يرجي ادخال اسم الجهة',

        ]);

        $recipients = recipients::find($id);
        $recipients->update([
            'recipient_name' => $request->recipient_name,
            'description' => $request->description,
            //'Created_by' => Auth::user()->name ,
        ]);

        session()->flash('edit','تم تعديل المرحلة التعليمية بنجاج');
        return redirect('/recipient');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        recipients::find($id)->delete();
        session()->flash('delete','تم حذف المرحلة التعليمية بنجاح');
        return redirect('/recipient');
    }
}
