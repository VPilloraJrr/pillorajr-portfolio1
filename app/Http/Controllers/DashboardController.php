<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function skill()
    {
            return view('dashboard.skill');
    }

    public function education()
    {
            return view('dashboard.education');
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
