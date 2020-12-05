<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingsRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function editShippingMethods($type){

        if($type === 'free')
            $shippingMethod = Setting::where('key','free_shipping_lable')->first();

        elseif($type === 'inner')
           $shippingMethod = Setting::where('key','local_shipping_lable')->first();

        elseif($type === 'outer')
           $shippingMethod = Setting::where('key','outer_shipping_lable')->first();

        else
           $shippingMethod = Setting::where('key','free_shipping_lable')->first();

        return view('dashboard.settings.shippings.edit', compact('shippingMethod'));

    } //end of editShippingMethods


    public function updateShippingMethods(ShippingsRequest $request , $id){

            try{

                $shipping_method = Setting::find($id);
                DB::beginTransaction();
                $shipping_method -> update(['plain_value'=>$request-> plain_value]);

                //save translation
                $shipping_method -> value= $request-> value ;
                $shipping_method -> save();
                DB::commit();
                return redirect()->back()->with(['success'=>'تم التدحديث بنجاح']);

            }catch(\Exception $ex)
            {
                return redirect()->back()->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
                DB::rollback();
            }

    }
}
