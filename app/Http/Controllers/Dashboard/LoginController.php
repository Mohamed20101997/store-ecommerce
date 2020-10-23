<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;


class LoginController extends Controller
{



    public function index(){

        return view('dashboard.auth.login');
    }

    public function postLogin(AdminLoginRequest $request){

        $remember_me = $request->has('remember_me') ? true : false ;


        if(auth()->guard('admin')->attempt(['email'=> $request->input("email") ,'password' =>  $request->input("password")  ] , $remember_me))
        {
            // notify()->success('تم الدخول بنجاح');
            return redirect()->route('admin.dashboard');
        }
        // notify()->error('خطأ بالبيانات برجاء المحاوله مجددا');
        return redirect()->back()->with(['error'=>'خطأ بالبيانات برجاء المحاوله مجددا']);

    }
}
