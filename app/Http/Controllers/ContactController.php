<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $data = DB::table('contacts')->get();
        return view('dashboard.contact', ['data'=>$data]);
    }

        public function storeContact (Request $request){
            Contact::create($request->all());
            return redirect()->back()->with('message', 'Message Created Succesfully');
        }
      /*$$$$$$$\  $$$$$$$$\ $$\       $$$$$$$$\ $$$$$$$$\ $$$$$$$$\ 
        $$  __$$\ $$  _____|$$ |      $$  _____|\__$$  __|$$  _____|
        $$ |  $$ |$$ |      $$ |      $$ |         $$ |   $$ |      
        $$ |  $$ |$$$$$\    $$ |      $$$$$\       $$ |   $$$$$\    
        $$ |  $$ |$$  __|   $$ |      $$  __|      $$ |   $$  __|   
        $$ |  $$ |$$ |      $$ |      $$ |         $$ |   $$ |      
        $$$$$$$  |$$$$$$$$\ $$$$$$$$\ $$$$$$$$\    $$ |   $$$$$$$$\ 
        \_______/ \________|\________|\________|   \__|   \________ */

    
        public function destroy($id) {
            DB::delete('delete from contacts where id = ?',[$id]);
    
            return redirect()->back()->with('message', 'Record Deleted Succesfully');
        }
}
