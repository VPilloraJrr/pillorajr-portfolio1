<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests\SkillRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
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

/*  $$$$$$$$\ $$$$$$$\  $$$$$$\ $$$$$$$$\ 
    $$  _____|$$  __$$\ \_$$  _|\__$$  __|
    $$ |      $$ |  $$ |  $$ |     $$ |   
    $$$$$\    $$ |  $$ |  $$ |     $$ |   
    $$  __|   $$ |  $$ |  $$ |     $$ |   
    $$ |      $$ |  $$ |  $$ |     $$ |   
    $$$$$$$$\ $$$$$$$  |$$$$$$\    $$ |   
    \________|\_______/ \______|   \__|    */

    public function show($id) {
        $data = DB::select('select * from skills where id = ?',[$id]);
        return view('dashboard.skill_update',['data'=>$data]);
     }
     public function edit(SkillRequest $request, $id) {

        if($request->hasFile('logo')){
            $filename = $request->input('logo')->getClientOriginalName();
            $request->input('logo')->storeAs('images', $filename, 'public');

            $skill_name = $request->input('skill_name');
            $percent = $request->input('percent');
            $logo = $request->input('logo')->getClientOriginalName();
            DB::update('update skills set skill_name = ?,percent = ?,logo = ? where id = ?',[$skill_name,$percent,$logo,$id]);
        }else{
            $skill_name = $request->input('skill_name');
            $percent = $request->input('percent');
            $logo = $request->input('logo');
            DB::update('update skills set skill_name = ?,percent = ?,logo = ? where id = ?',[$skill_name,$percent,$logo,$id]);
        }
        return redirect('dashboard/skill')->with('message', 'Data Updated Succesfully');
     }
                                        
  /* $$$$$$\  $$$$$$$\  $$$$$$$$\  $$$$$$\ $$$$$$$$\ $$$$$$$$\ 
    $$  __$$\ $$  __$$\ $$  _____|$$  __$$\\__$$  __|$$  _____|
    $$ /  \__|$$ |  $$ |$$ |      $$ /  $$ |  $$ |   $$ |      
    $$ |      $$$$$$$  |$$$$$\    $$$$$$$$ |  $$ |   $$$$$\    
    $$ |      $$  __$$< $$  __|   $$  __$$ |  $$ |   $$  __|   
    $$ |  $$\ $$ |  $$ |$$ |      $$ |  $$ |  $$ |   $$ |      
    \$$$$$$  |$$ |  $$ |$$$$$$$$\ $$ |  $$ |  $$ |   $$$$$$$$\ 
     \______/ \__|  \__|\________|\__|  \__|  \__|   \________| */
 
    public function storeSkill (SkillRequest $request){
        if($request->hasFile('logo')){
            $filename = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('images', $filename, 'public'); 

            $skill = new Skill();
            $skill->skill_name = $request->skill_name;
            $skill->percent = $request->percent;
            $skill->logo = $request->file('logo')->getClientOriginalName();
            $skill->save();
        }else{
            $skill = new Skill();
            $skill->skill_name = $request->skill_name;
            $skill->percent = $request->percent;
            $skill->logo = $request->logo;
            $skill->save(); 
        }
        return redirect()->back()->with('message', 'Data Created Succesfully');
    }

 /* $$$$$$$\  $$$$$$$$\ $$\       $$$$$$$$\ $$$$$$$$\ $$$$$$$$\ 
    $$  __$$\ $$  _____|$$ |      $$  _____|\__$$  __|$$  _____|
    $$ |  $$ |$$ |      $$ |      $$ |         $$ |   $$ |      
    $$ |  $$ |$$$$$\    $$ |      $$$$$\       $$ |   $$$$$\    
    $$ |  $$ |$$  __|   $$ |      $$  __|      $$ |   $$  __|   
    $$ |  $$ |$$ |      $$ |      $$ |         $$ |   $$ |      
    $$$$$$$  |$$$$$$$$\ $$$$$$$$\ $$$$$$$$\    $$ |   $$$$$$$$\ 
    \_______/ \________|\________|\________|   \__|   \________ */

    public function destroy($id) {
        DB::delete('delete from skills where id = ?',[$id]);

        return redirect()->back()->with('message', 'Record Deleted Succesfully');
    }
}
