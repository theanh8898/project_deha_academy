<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

class UserController extends Controller
{
    public function getLoginAdmin(){
    	return view('index');
    }

    public function postLoginAdmin(Request $request){
    	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
    		if(Auth::user()->isAdmin == 1)
    		{
    			return redirect('/laptops');
    		}
    		else
    		{
    			return redirect('dangnhap')->with('error','You have not admin access');
    		}
    	} else {
    		return redirect('dangnhap')->with('error','Login Failed,Incorrect password or email');
    	}

    }

    public function getLogoutAdmin(){
        Auth::logout();
        return redirect('dangnhap');
    }
}
