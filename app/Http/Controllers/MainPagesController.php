<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;

class MainPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main = Main::first();

        return view('pages.main', compact('main'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'sub_title' => 'required|max:255',
        ]);

        $main = Main::first();
        $main->title = $request->title;
        $main->sub_title = $request->sub_title;

        if($request->file('bc_img')){
            $img_file = $request->file('bc_img');
            $img_file->storeAs('public/img', 'bc_img.'.$img_file->getClientOriginalExtension());
            $main->bc_img = 'storage/img/bc_img.'. $img_file->getClientOriginalExtension();
        }

        if($request->file('resume')){
            $img_file = $request->file('resume');
            $img_file->storeAs('public/img', 'resume.'.$img_file->getClientOriginalExtension());
            $main->resume = 'storage/img/resume.'. $img_file->getClientOriginalExtension();
        }

        $main->save();

        return redirect()->route('admin.main')->with('success', 'Data Updated Successfulyy');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
