<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Team;

class TeamsPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $teams = Team::all();
        return view('pages.team.list', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.team.create');
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

            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'image' => 'required|image'

        ]);

        $teams = new Team;
        $teams->name = $request->name;
        $teams->position = $request->position;
        if($request->file('image')){
            $image= $request->file('image');
            $filename= date('YmdHi').$image->getClientOriginalName();
            $image-> move(public_path('public/img'), $filename);
            $teams['image']= $filename;
        }

        $teams->save();

        return redirect()->route('admin.teams.create')->with('success', 'New team Member created successfully');

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
        $teams = Team::find($id);
        return view('pages.team.edit', compact('teams'));
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

            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'image' => 'required|image'

        ]);

        $teams = Team::find($id);
        $teams->name = $request->name;
        $teams->position = $request->position;
        if($request->file('image')){
            $image= $request->file('image');
            $filename= date('YmdHi').$image->getClientOriginalName();
            $image-> move(public_path('public/img'), $filename);
            $teams['image']= $filename;
        }

        $teams->save();

        return redirect()->route('admin.teams.list')->with('success', 'Team Member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teams = Team::find($id);
        @unlink(public_path($teams->image));
        $teams->delete();

        return redirect()->route('admin.teams.list')->with('success', "Member deleted successfully");

    }
}
