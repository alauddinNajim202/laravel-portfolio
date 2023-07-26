<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutsPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $abouts = About::all();
        return view('pages.about.list', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'sub_title' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'required|image'

        ]);

        $about = new About;
        $about ->title = $request->title;
        $about ->sub_title = $request->sub_title;
        $about ->description = $request->description;

        if($request->file('image')){
            $image= $request->file('image');
            $filename= date('YmdHi').$image->getClientOriginalName();
            $image-> move(public_path('public/img'), $filename);
            $about['image']= $filename;
        }

       $about->save();

        return redirect()->route('admin.abouts.create')->with('success', 'New About uploaded successfully');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $abouts = About::find($id);
        return view('pages.about.edit', compact('abouts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'sub_title' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'required|image'

        ]);

        $about = About::find($id);
        $about ->title = $request->title;
        $about ->sub_title = $request->sub_title;
        $about ->description = $request->description;

        if($request->file('image')){
            $image= $request->file('image');
            $filename= date('YmdHi').$image->getClientOriginalName();
            $image-> move(public_path('public/img'), $filename);
            $about['image']= $filename;
        }

       $about->save();

        return redirect()->route('admin.abouts.list')->with('success', 'About Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $abouts = About::find($id);
       @unlink(public_path($abouts->image));
       $abouts->delete();


       return redirect()->route('admin.abouts.list')->with('success', "Abouts deleted successfully");
    }
}
