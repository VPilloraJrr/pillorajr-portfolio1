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
        
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->content = $request->content;
        $contact->save();
        toastr()->success('Email Created Succesfully');
        return redirect()->back();
        
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
            toastr()->success('Data Deleted Succesfully');
            return redirect()->back();
        }
}
