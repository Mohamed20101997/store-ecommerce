<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersVerificationCodes extends Model
{

    protected $table = 'users_verification_code';

    protected $fillable = ['user_id', 'code','created_at','updated_at'];





}
