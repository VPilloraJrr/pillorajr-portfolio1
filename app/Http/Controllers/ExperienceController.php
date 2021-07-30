<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ExperienceRequest;
use App\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
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
        return view('dashboard.experience.index', ['data'=>$data]);
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
        $data = DB::select('select * from experiences where id = ?',[$id]);
        return view('dashboard.experience.experience_update',['data'=>$data]);
    }
    public function edit(ExperienceRequest $request, $id) {
                
        $position_name = $request->input('position_name');
        $description = $request->input('description');
        $year_started = $request->input('year_started');
        $year_resigned = $request->input('year_resigned');
        DB::update('update experiences set position_name = ?,description = ?,year_started = ?,year_resigned = ? where id = ?',[$position_name,$description,$year_started,$year_resigned,$id]);
        return redirect('dashboard/experience')->with('message', 'Data Updated Succesfully');
    }
                                            
      /* $$$$$$\  $$$$$$$\  $$$$$$$$\  $$$$$$\ $$$$$$$$\ $$$$$$$$\ 
        $$  __$$\ $$  __$$\ $$  _____|$$  __$$\\__$$  __|$$  _____|
        $$ /  \__|$$ |  $$ |$$ |      $$ /  $$ |  $$ |   $$ |      
        $$ |      $$$$$$$  |$$$$$\    $$$$$$$$ |  $$ |   $$$$$\    
        $$ |      $$  __$$< $$  __|   $$  __$$ |  $$ |   $$  __|   
        $$ |  $$\ $$ |  $$ |$$ |      $$ |  $$ |  $$ |   $$ |      
        \$$$$$$  |$$ |  $$ |$$$$$$$$\ $$ |  $$ |  $$ |   $$$$$$$$\ 
         \______/ \__|  \__|\________|\__|  \__|  \__|   \________| */
     
        public function storeExperience (ExperienceRequest $request){
            
            $exp = new Experience();
            $exp->position_name = $request->position_name;
            $exp->description = $request->description;
            $exp->year_started = $request->year_started;
            $exp->year_resigned = $request->year_resigned;
            $exp->save();
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
            DB::delete('delete from experiences where id = ?',[$id]);
    
            return redirect()->back()->with('message', 'Record Deleted Succesfully');
        }
}
