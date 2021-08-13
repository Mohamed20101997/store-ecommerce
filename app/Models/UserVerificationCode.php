<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserVerificationCode extends Model
{

    protected $fillable = [ 'user_id', 'code' ];

    public function attribute(){
        return $this -> belongsTo(Attribute::class,'attribute_id');
    }

}
