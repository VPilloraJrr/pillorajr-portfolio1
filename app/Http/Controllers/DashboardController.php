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
        ],[
                'position_name' => 'Freelance Web Developer',
                'description' => 'Working happily on my own web projects',
                'year_started' => '2019',
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
        $logos = $request->file('logo');
        $filename = $logos->getClientOriginalName();
        $logos->storeAs('images', $filename, 'public'); 

        $skill = new Skill();
        $skill->skill_name = $request->skill_name;
        $skill->percent = $request->percent;
        $skill->logo = $logos->getClientOriginalName();
        $skill->save();
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
