<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use Translatable;

        protected $with = ['translations'];
        protected $translatedAttributes  = ['name'];
        protected $guarded = [];


        public function options()
        {
            return $this->hasMany(Option::class,'attribute_id');
        }

}
