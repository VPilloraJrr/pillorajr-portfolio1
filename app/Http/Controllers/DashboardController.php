<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Education;
use App\Skill;
use App\Experience;
use App\Portfolio;
use App\Contact;


class DashboardController extends Controller
{

    public function portfolio()
    {
        $data = DB::table('portfolios')->get();
        return view('dashboard.portfolio', ['data'=>$data]);
    }

    public function contact()
    {
        $data = DB::table('contacts')->get();
        return view('dashboard.contact', ['data'=>$data]);
    }

    public function store (Request $request){
        Contact::create($request->all());
        return redirect()->back()->with('message', 'Message Created Succesfully');
    }

    public function storeEducation (Request $request){
        $educ = $request->file('logo');
        $filename = $educ->getClientOriginalName();
        $educ->storeAs('images', $filename, 'public'); 

        $educ = new Education();
        $educ->school_name = $request->school_name;
        $educ->year_started = $request->year_started;
        $educ->year_graduated = $request->year_graduated;
        $educ->logo = $educ->getClientOriginalName();
        $educ->save();
        return redirect()->back()->with('message', 'Message Created Succesfully');
    }

    public function storeExperience (Request $request){
        Experience::create($request->all());
        return redirect()->back()->with('message', 'Message Created Succesfully');
    }

    public function storePortfolio (Request $request){
        $screenshot = $request->file('screenshot');
        $filename = $screenshot->getClientOriginalName();
        $screenshot->storeAs('images', $filename, 'public'); 

        $portfolio = new Portfolio();
        $portfolio->project_name = $request->project_name;
        $portfolio->client = $request->client;
        $portfolio->description = $request->description;
        $portfolio->screenshot = $screenshot->getClientOriginalName();
        $portfolio->save();
        return redirect()->back()->with('message', 'Message Created Succesfully');
    }
}
