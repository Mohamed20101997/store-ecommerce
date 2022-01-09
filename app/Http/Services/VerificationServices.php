<?php

namespace App\Http\Services;

use App\Models\User;
use App\Models\UsersVerificationCodes;
use Illuminate\Support\Facades\Auth;


class VerificationServices
{
    /** set OTP code for mobile
     * @param $data
     *
     * @return UsersVerificationCodes
     */
    public function setVerificationCode($data)
    {
        $code = mt_rand(100000, 999999);
        $data['code'] = $code;
        UsersVerificationCodes::whereNotNull('user_id')->where(['user_id' => $data['user_id']])->delete();
        return UsersVerificationCodes::create($data);
    }

    public function getSMSVerifyMessageByAppName($code)
    {
            $message = " is your verification code for your account";
             return $code.$message;
    }


    public function checkOTPCode ($code){

        if (Auth::guard()->check()) {
            $verificationData = UsersVerificationCodes::where('user_id',Auth::id()) -> first();

            if($verificationData -> code == $code){
                User::whereId(Auth::id()) -> update(['email_verified_at' => now()]);
                return true;
            }else{
                return false;
            }
        }
        return false ;
    }


    public function removeOTPCode($code)
    {
        UsersVerificationCodes::where('code',$code) -> delete();
    }

}
