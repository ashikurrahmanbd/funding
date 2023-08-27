<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UsersController extends Controller
{
    public function dash_users_index(){

        $users = DB::table('users')->get();

        return view('backend.users', ['users' => $users]);
    }
}
