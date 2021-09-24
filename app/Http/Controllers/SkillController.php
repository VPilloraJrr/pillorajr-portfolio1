<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests\SkillRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        return view('dashboard.skill.index', ['data'=>$data]);
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
        return view('dashboard.skill.skill_update',['data'=>$data]);
     }
     public function edit(SkillRequest $request, $id) {

        
        $update = ['skill_name'=>$request->skill_name,'percent'=>$request->percent, 'logo' =>$request->logo];
        
        if($files = $request->file('logo')){
            $path = 'storage/images';
            $filename = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->storeAs($path, $filename);
            $update['logo'] = "$filename";
            
        }
        $update['skill_name'] = $request->get('skill_name');
        $update['percent'] = $request->get('percent');
        Skill::where('id', $id)->update($update);
        toastr()->success('Data Updated Succesfully');
        return redirect('dashboard/skill');
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
        $skill = new Skill();
        $skill->skill_name = $request->skill_name;
        $skill->percent = $request->percent;

        if($files = $request->file('logo')){
            $path = 'storage/images';
            $filename = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($path, $filename);
            $skill->logo = "$filename";
        }
        $skill->save(); 
        
        toastr()->success('Data Created Succesfully');

        return redirect()->back();
        
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
        toastr()->success('Record Deleted Succesfully');
        return redirect()->back();
    }
    
}
