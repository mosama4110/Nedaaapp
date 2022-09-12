<?php

namespace App\Http\Controllers;

use App\Models\school;
use App\Models\recipients;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $school= school::all();
      $recipient= recipients::all();
      return view('school.school',compact('school' ,'recipient'));
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
          'school_name' => 'required|max:255|unique:schools',
          ],[
            'school_name.required' =>'يرجي ادخال اسم المدرسة ',
            'school_name.unique' =>'اسم المدرسة  مسجل مسبقا',
            'school_name'=>'يرجي ادخال اسم المدرسة ',
      ]);
          school::create([
              'school_name'=> $request->school_name,
              'recipients_id' => $request->section_id,
              'school_type'=> $request->school_type ,
              'school_phone'=> $request->school_phone ,
              'school_add'=> $request->school_add ,
              'profile_logo_path'=> $request->profile_logo_path,
              'description'=> $request->description ,
          ]);
          session()->flash('Add', 'تمت اضافة المدرسة بنجاح');
          return redirect('/school');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\school  $school
     * @return \Illuminate\Http\Response
     */
    public function show(school $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\school  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(school $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\school  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $id = $request->id;

      $this->validate($request, [
      'school_name' => 'required|max:255|unique:schools,school_name,'.$id,
      ],[
        'school_name.required' =>'يرجي ادخال اسم المدرسة ',
        'school_name.unique' =>'اسم المدرسة  مسجل مسبقا',
        'school_name'=>'يرجي ادخال اسم المدرسة ',
  ]);
      $school = school::find($id);
      $school->update([
          'school_name'=> $request->school_name,
          'recipients_id' => $request->section_id,
          'school_type'=> $request->school_type ,
          'school_phone'=> $request->school_phone ,
          'school_add'=> $request->school_add ,
          'profile_logo_path'=> $request->profile_logo_path,
          'description'=> $request->description ,
      ]);
      session()->flash('edit','تمت تعديل المدرسة بنجاح');
      return redirect('/school');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\school  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $school = school::find($id)->delete();
        session()->flash('delete','تم حذف المدرسة بنجاح');
        return redirect('/school');

    }
}
