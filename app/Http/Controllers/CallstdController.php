<?php

namespace App\Http\Controllers;

use App\Models\callstd;
use App\Models\student;
use Illuminate\Http\Request;

class CallstdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          return view('callstd.cal_stud');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function call(Request $request)
    {
      $id = $request->rfid;
      $student= student::all()->where('rfid', $id);
      return view('callstd.callstd',compact('student'));
    }
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
      $id = $request->rfid;
      $student= student::all()->where('rfid', $id);
      return view('callstd.callstd',compact('student'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\callstd  $callstd
     * @return \Illuminate\Http\Response
     */
    public function show(callstd $callstd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\callstd  $callstd
     * @return \Illuminate\Http\Response
     */
    public function edit(callstd $callstd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\callstd  $callstd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, callstd $callstd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\callstd  $callstd
     * @return \Illuminate\Http\Response
     */
    public function destroy(callstd $callstd)
    {
        //
    }
}
