<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Education;
use App\Skill;
use App\Experience;
use App\Portfolio;
use App\Contact;


class DashboardController extends Controller
{
        public function skill()
        {
            $data = [[
                    'skill_name' => 'HTML',
                    'percent' => '90',    
            ],
            [
                    'skill_name' => 'CSS',
                    'percent' => '85',    
            ],
            [
                    'skill_name' => 'JavaScript',
                    'percent' => '60',    
            ],
            [
                    'skill_name' => 'PHP',
                    'percent' => '60',    
            ],
            [
                    'skill_name' => 'XAMPP',
                    'percent' => '70',    
            ],
            [
                    'skill_name' => 'Github',
                    'percent' => '70',    
            ],
            [
                    'skill_name' => 'Gitlab',
                    'percent' => '73',    
            ],
            [
                    'skill_name' => 'C++',
                    'percent' => '81',    
            ],
            [
                    'skill_name' => 'Bootstrap',
                    'percent' => '84',    
            ],
            [
                    'skill_name' => 'Java',
                    'percent' => '75',    
            ],
            ];
    
            //Skill::insert($data);
    
            $data = DB::table('skills')->get();
            return view('dashboard.skill', ['data'=>$data]);
        }

    public function education()
    {
        $data = [[
                'school_name' => 'Teodora Moscos Elementary School',
                'year_started' => '2011' ,
                'year_graduated' => '2012',
        ],
        
        [
                'school_name' => 'Ateneo de Naga Junior High School',
                'year_started' => '2012' ,
                'year_graduated' => '2016',
        ],

        [
                'school_name' => 'Ateneo de Naga Senior High School',
                'year_started' => '2016' ,
                'year_graduated' => '2018',
        ],
        [
                'school_name' => 'Ateneo de Naga University',
                'year_started' => '2018' ,
                'year_graduated' => '2022',
        ]];

        //Education::insert($data);
        //Education::create($data1);
        //Education::create($data2);
       //Education::create($data3);

        $data = DB::table('educations')->get();
        return view('dashboard.education', ['data'=>$data]);
    }
    
    public function experience()
    {
        $data = [
        [
                'position_name' => 'Lead Web Developer',
                'description' => 'Beautiful project for a major digital agency',
                'year_started' => '2018',
                'year_resigned' => '2019',
        ],
        [
                'position_name' => 'Senior Web Designer',
                'description' => 'Inhouse web designer for ecommerce firm',
                'year_started' => '2017',
                'year_resigned' => '2018',
        ],
        [
                'position_name' => 'Junior Web Designer',
                'description' => 'Junior web designer for small web agency',
                'year_started' => '2016',
                'year_resigned' => '2017',
        ],];

        //Experience::insert($data);
        $data = DB::table('experiences')->get();
        return view('dashboard.experience', ['data'=>$data]);
    }

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

    public function storeSkill (Request $request){
        Skill::create($request->all());
        return redirect()->back()->with('message', 'Message Created Succesfully');
    }

    public function storeEducation (Request $request){
        Education::create($request->all());
        return redirect()->back()->with('message', 'Message Created Succesfully');
    }

    public function storeExperience (Request $request){
        Experience::create($request->all());
        return redirect()->back()->with('message', 'Message Created Succesfully');
    }

    public function storePortfolio (Request $request){
        Portfolio::create($request->all());
        return redirect()->back()->with('message', 'Message Created Succesfully');
    }

}
