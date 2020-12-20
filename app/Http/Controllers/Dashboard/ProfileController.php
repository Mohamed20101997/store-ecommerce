<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function editProfile(){

        $id = auth()->user()->id;

        $admin = Admin::findOrFail($id);

        return view('dashboard.profiles.edit', compact('admin'));

    }

    public function updateProfile(ProfileRequest $request){

        try{

            $admin = Admin::find(auth('admin')->user()->id);
           
            if($request->has('password')){
                $request->merge(['password' => bcrypt($request->password)]);
            }

            unset($request['id'], $request['password_confirmation']);
            $admin->update($request->all());


            return redirect()->back()->with(['success'=>'تم التدحديث بنجاح']);


        }catch(\Exception $ex)
        {
            return redirect()->back()->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);

        }

    }
}
