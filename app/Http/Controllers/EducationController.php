<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\EducationRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
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
        return view('dashboard.education.index', ['data'=>$data]);
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
            $data = DB::select('select * from educations where id = ?',[$id]);
            return view('dashboard.education.education_update',['data'=>$data]);
         }
         public function edit(EducationRequest $request, $id) {
    
            if($request->hasFile('logo')){
                $filename = $request->input('logo')->getClientOriginalName();
                $request->input('logo')->storeAs('images', $filename, 'public');
    
                $school_name = $request->input('school_name');
                $year_started = $request->input('year_started');
                $year_graduated = $request->input('year_graduated');
                $logo = $request->input('logo')->getClientOriginalName();
                DB::update('update educations set school_name = ?,year_started = ?,year_graduated = ?,logo = ? where id = ?',[$school_name,$year_started,$year_graduated,$logo,$id]);
            }else{
                $school_name = $request->input('school_name');
                $year_started = $request->input('year_started');
                $year_graduated = $request->input('year_graduated');
                $logo = $request->input('logo');
                DB::update('update educations set school_name = ?,year_started = ?,year_graduated = ?,logo = ? where id = ?',[$school_name,$year_started,$year_graduated,$logo,$id]);
            }
            return redirect('dashboard/education')->with('message', 'Data Updated Succesfully');
         }
                                            
      /* $$$$$$\  $$$$$$$\  $$$$$$$$\  $$$$$$\ $$$$$$$$\ $$$$$$$$\ 
        $$  __$$\ $$  __$$\ $$  _____|$$  __$$\\__$$  __|$$  _____|
        $$ /  \__|$$ |  $$ |$$ |      $$ /  $$ |  $$ |   $$ |      
        $$ |      $$$$$$$  |$$$$$\    $$$$$$$$ |  $$ |   $$$$$\    
        $$ |      $$  __$$< $$  __|   $$  __$$ |  $$ |   $$  __|   
        $$ |  $$\ $$ |  $$ |$$ |      $$ |  $$ |  $$ |   $$ |      
        \$$$$$$  |$$ |  $$ |$$$$$$$$\ $$ |  $$ |  $$ |   $$$$$$$$\ 
         \______/ \__|  \__|\________|\__|  \__|  \__|   \________| */
     
        public function storeEducation (EducationRequest $request){
            if($request->hasFile('logo')){
                $filename = $request->file('logo')->getClientOriginalName();
                $request->file('logo')->storeAs('images', $filename, 'public'); 
    
                $education = new Education();
                $education->school_name = $request->school_name;
                $education->year_started = $request->year_started;
                $education->year_graduated = $request->year_graduated;
                $education->logo = $request->file('logo')->getClientOriginalName();
                $education->save();
            }else{
                $education = new Education();
                $education->school_name = $request->school_name;
                $education->year_started = $request->year_started;
                $education->year_graduated = $request->year_graduated;
                $education->logo = $request->logo;
                $education->save();
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
            DB::delete('delete from educations where id = ?',[$id]);
    
            return redirect()->back()->with('message', 'Record Deleted Succesfully');
        }
}
