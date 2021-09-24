<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\PortfolioRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{

    public function index()
    {
        $data = DB::table('portfolios')->get();
        return view('dashboard.portfolio.index', ['data'=>$data]);
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
        $data = DB::select('select * from portfolios where id = ?',[$id]);
        return view('dashboard.portfolio.portfolio_update',['data'=>$data]);
     }
     public function edit(PortfolioRequest $request, $id) {

        if($request->hasFile('screenshot')){
            $filename = $request->input('screenshot')->getClientOriginalName();
            $request->input('screenshot')->storeAs('images', $filename, 'public');

            $project_name = $request->input('project_name');
            $client = $request->input('client');
            $description = $request->input('description');
            $screenshot = $request->input('screenshot')->getClientOriginalName();
            DB::update('update portfolios set project_name = ?,client = ?,description = ?,screenshot = ? where id = ?',[$project_name,$client,$description,$screenshot,$id]);
        }else{
            $project_name = $request->input('project_name');
            $client = $request->input('client');
            $description = $request->input('description');
            $screenshot = $request->input('screenshot');
            DB::update('update portfolios set project_name = ?,client = ?,description = ?,screenshot = ? where id = ?',[$project_name,$client,$description,$screenshot,$id]);
        }
        toastr()->success('Data Updated Succesfully');
        return redirect('dashboard/portfolio');
     }
                                        
  /* $$$$$$\  $$$$$$$\  $$$$$$$$\  $$$$$$\ $$$$$$$$\ $$$$$$$$\ 
    $$  __$$\ $$  __$$\ $$  _____|$$  __$$\\__$$  __|$$  _____|
    $$ /  \__|$$ |  $$ |$$ |      $$ /  $$ |  $$ |   $$ |      
    $$ |      $$$$$$$  |$$$$$\    $$$$$$$$ |  $$ |   $$$$$\    
    $$ |      $$  __$$< $$  __|   $$  __$$ |  $$ |   $$  __|   
    $$ |  $$\ $$ |  $$ |$$ |      $$ |  $$ |  $$ |   $$ |      
    \$$$$$$  |$$ |  $$ |$$$$$$$$\ $$ |  $$ |  $$ |   $$$$$$$$\ 
     \______/ \__|  \__|\________|\__|  \__|  \__|   \________| */
 
    public function storePortfolio (PortfolioRequest $request){
        if($request->hasFile('screenshot')){
            $filename = $request->file('screenshot')->getClientOriginalName();
            $request->file('screenshot')->storeAs('images', $filename, 'public'); 

            $portfolio = new Portfolio();
            $portfolio->project_name = $request->project_name;
            $portfolio->client = $request->client;
            $portfolio->description = $request->description;
            $portfolio->screenshot = $request->file('screenshot')->getClientOriginalName();
            $portfolio->save();
        }else{
            $portfolio = new Portfolio();
            $portfolio->project_name = $request->project_name;
            $portfolio->client = $request->client;
            $portfolio->description = $request->description;
            $portfolio->screenshot = $request->screenshot;
            $portfolio->save(); 
        }
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
        DB::delete('delete from portfolios where id = ?',[$id]);
        toastr()->success('Data Deleted Succesfully');
        return redirect()->back();
    }
}
