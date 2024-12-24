<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NGD_QUAN_TRIController extends Controller
{
    //get login
    public function ngdLogin(){
        return view('NgdLogin.ngd-login');
}
//post login
public function ngdLoginSubmit(Request $request){
    return view('NgdLogin.ngd-login');
}
}
