<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\DB;
use App\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $data = DB::table('contacts')->get();
        return view('dashboard.contact.index', ['data'=>$data]);
    }

    public function storeContact (ContactRequest $request){
        if($request->fails()) {
            return back()->withErrors($request->errors());
        }else{
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->content = $request->content;
            $contact->save();
            return redirect()->back()->with('message', 'Message Created Succesfully');
        }
        
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
