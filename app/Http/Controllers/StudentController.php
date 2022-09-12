<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\school;
use App\Models\recipients;
use App\Models\map_sizes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $school_id = Auth::user()->school_id;
      $y = school::find($school_id);
      $school=$y->school_name;
      $recipients_id = $y->recipients_id;
      $x= recipients::find($recipients_id);
      $recipient=$x->recipient_name;
      $map_size= map_sizes::all()->where('recipients_id', $recipients_id);
      $student= student::all()->where('school_name', $school);;
      return view('student.student',compact('student','map_size' ,'recipient','school'));
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
      $this->validate($request, [
      'student_name' => 'required',
      'student_nameen' => 'required',
      'student_idno' => 'required',
      'school_name' => 'required',
      'edu_level' => 'required',
      'Semester' => 'required',
      'rfid' => 'required',
      'student_img_path' => 'required',
      ]);

      $input = $request->all();

      $student = student::create($input);
      return redirect()->route('student.index')
      ->with('success','تم اضافة الطالب بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        //
    }
}
