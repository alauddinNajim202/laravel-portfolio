<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\portfolio;
use Illuminate\Support\Facades\Storage;

class PortfoliosPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function list()
    {
        $portfolios =  portfolio::all();
        return view('pages.portfolio.list', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.portfolio.create');
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
            'big_img' => 'required|image',
            'small_img' => 'required|image',
            'description' => 'required|max:255',
            'client' => 'required|max:255',
            'category' => 'required|max:255',
        ]);

        $portfolio = new portfolio;
        $portfolio->title = $request->title;
        $portfolio->sub_title = $request->sub_title;
        $portfolio->description = $request->description;
        $portfolio->client = $request->client;
        $portfolio->category = $request->category;

        if($request->file('big_img')){
            $big_file= $request->file('big_img');
            $filename= date('YmdHi').$big_file->getClientOriginalName();
            $big_file-> move(public_path('public/img'), $filename);
            $portfolio['big_img']= $filename;
        }


        if($request->file('small_img')){
            $small_file= $request->file('small_img');
            $filename= date('YmdHi').$small_file->getClientOriginalName();
            $small_file-> move(public_path('public/img'), $filename);
            $portfolio['small_img']= $filename;
        }

        // $big_file = $request->file('big_img');
        // Storage::putfile('public/img', $big_file);
        // $portfolio->big_img = "storage/img".$big_file->hashName();

        // $small_file = $request->file('small_img');
        // Storage::putfile('public/img', $small_file);
        // $portfolio->small_img = "storage/img".$small_file->hashName();


        $portfolio->save();

        return redirect()->route('admin.portfolios.create')->with('success', 'New portfolio Updated Successfully');
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
        $portfolio = portfolio::find($id);
        return view('pages.portfolio.edit', compact('portfolio'));
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
            'client' => 'required|max:255',
            'category' => 'required|max:255',
        ]);

        $portfolio = portfolio::find($id);
        $portfolio->title = $request->title;
        $portfolio->sub_title = $request->sub_title;
        $portfolio->description = $request->description;
        $portfolio->client = $request->client;
        $portfolio->category = $request->category;

        if($request->file('big_img')){
            $big_file= $request->file('big_img');
            $filename= date('YmdHi').$big_file->getClientOriginalName();
            $big_file-> move(public_path('public/img'), $filename);
            $portfolio['big_img']= $filename;
        }


        if($request->file('small_img')){
            $small_file= $request->file('small_img');
            $filename= date('YmdHi').$small_file->getClientOriginalName();
            $small_file-> move(public_path('public/img'), $filename);
            $portfolio['small_img']= $filename;
        }

        $portfolio->save();

        return redirect()->route('admin.portfolios.list')->with('success', 'Portfolio Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = portfolio::find($id);
        @unlink(public_path($portfolio->big_img));
        @unlink(public_path($portfolio->small_img));
        $portfolio->delete();

        return redirect()->route('admin.portfolios.list')->with('success', 'Portfolio deleted Successfully');

    }
}
