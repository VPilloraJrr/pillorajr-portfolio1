<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'name' => 'Jr',
            'email' => 'vpillorajr@gmail.com',
            'password' => 'jehp0828'    
        ];

        //User::create($data);

        //$user           = new User();
        //$user->name     =  'jeh';
        //$user->email    =  'jrpillora@gmail.com';
        //$user->password =  bcrypt('09484573620');
    // $user->save();

        $user = User::all();
        return $user;

        //User::where('id', 2)->delete();

        //User::where('id', 3)->update(['name' =>'Jeh']);

        //DB::insert('insert into users (name, email, password) values (?, ?, ?)', ['jeh', 'jrpillora@gmail.com', '09484573620']);
        //$users = DB::select('select * from users');
        //return $users;

        //DB::update('update users set name = ? where id = 1', ['jehp']);

        //DB::delete('delete from     users where id = 1');

    // $users = DB::select('select * from users');
        //return $users;
        return view('home');
    }
}
