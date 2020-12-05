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

        $remember_token = $request->has('remember_token') ? true : false ;


        if(auth()->guard('admin')->attempt(['email'=> $request->input("email") ,'password' =>  $request->input("password")  ] , $remember_token))
        {
            // notify()->success('تم الدخول بنجاح');
            return redirect()->route('admin.dashboard');
        }
        // notify()->error('خطأ بالبيانات برجاء المحاوله مجددا');
        return redirect()->back()->with(['error'=>'خطأ بالبيانات برجاء المحاوله مجددا']);

    }

    public function logout(){

        $guard  = $this->getGaurd();
        $guard->logout();
        return redirect()->route('admin.login');

    }

    private function getGaurd(){

        return auth('admin');

    }
}
