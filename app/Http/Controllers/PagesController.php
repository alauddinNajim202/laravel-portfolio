<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;
use App\Models\Services;
use App\Models\portfolio;
use App\Models\About;
use App\Models\Team;

class PagesController extends Controller
{
    // __index Method__ //
    public function index(){
        $main = Main::first();
        $services = Services::all();
        $portfolio = portfolio::all();
        $abouts = About::all();
        $teams = Team::all();
        return view('pages.index', compact('main', 'services', 'portfolio','abouts', 'teams'));
    }

     // __Dashboard Method__ //
     public function dashboard(){
        return view('pages.dashboard');
    }






}
