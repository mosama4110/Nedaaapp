<?php

namespace App\Http\Controllers;

use App\Models\exports;
use Illuminate\Http\Request;

class ExportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('exports.exports');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\exports  $exports
     * @return \Illuminate\Http\Response
     */
    public function show(exports $request)
    {
        return $request;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\exports  $exports
     * @return \Illuminate\Http\Response
     */
    public function edit(exports $exports)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\exports  $exports
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, exports $exports)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\exports  $exports
     * @return \Illuminate\Http\Response
     */
    public function destroy(exports $exports)
    {
        //
    }

    public function exportsadd(Request $request)
    {
        return $request;
    }
}
