<?php

namespace App\Http\Controllers;
use App\Models\map_sizes;
use App\Models\recipients;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MapSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $map_size= map_sizes::all();
        $recipient= recipients::all();
        return view('map_size.map_size',compact('map_size' ,'recipient'));
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
            'mapsizes_name' => 'required|max:255|unique:map_sizes',
            ],[
            'mapsizes_name.required' =>'يرجي ادخال اسم الصف',
            'mapsizes_name.unique' =>'اسم الصف مسجل مسبقا',
            'mapsizes_name'=>'يرجي ادخال اسم الصف',
        ]);
            map_sizes::create([
                'mapsizes_name' => $request->mapsizes_name,
                'description' => $request->description,
                'recipients_id' => $request->section_id,
            ]);

            session()->flash('Add', 'تمت اضافة الصف بنجاح');
            return redirect('/map_size');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\map_size  $map_size
     * @return \Illuminate\Http\Response
     */
    public function show(map_size $map_size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\map_size  $map_size
     * @return \Illuminate\Http\Response
     */
    public function edit(map_size $map_size)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\map_size  $map_size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [

            'mapsizes_name' => 'required|max:255|unique:map_sizes,mapsizes_name,'.$id,
            'description' => 'required',
            ],[
            'recipients_id.required' =>'يرجي ادخال البيان',
            'mapsizes_name.required' =>'يرجي ادخال اسم الصف',
            'mapsizes_name.unique' =>'اسم الصف مسجل مسبقا',
            'mapsizes_name'=>'يرجي ادخال اسم الصف',
        ]);

        $map_sizes = map_sizes::find($id);
        $map_sizes->update([
            'mapsizes_name' => $request->mapsizes_name,
            'description' => $request->description,
            'recipients_id' => $request->section_id,
        ]);

        session()->flash('edit','تمت اضافة الصف بنجاح');
        return redirect('/map_size');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\map_size  $map_size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        map_sizes::find($id)->delete();
        session()->flash('delete','تم حذف الصف بنجاح');
        return redirect('/map_size');
    }
}
