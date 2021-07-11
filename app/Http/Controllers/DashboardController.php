<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Education;

class DashboardController extends Controller
{
    public function skill()
    {
            return view('dashboard.skill');
    }

    public function education()
    {
        $data = DB::table('educations')->get();
        return view('dashboard.education', ['data'=>$data]);
    }
    
    public function experience()
    {
            return view('dashboard.experience');
    }

    public function portfolio()
    {
            return view('dashboard.portfolio');
    }

    public function contact()
    {
            return view('dashboard.contact');
    }
}
