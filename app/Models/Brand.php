<?php

namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Translatable;

    protected $with = ['translations'];

    protected $translatedAttributes = ['name'];

    protected $fillable = ['photo',];


    protected $casts = [

        'is_active' => 'boolean',
    ];


        public function getActive()
    {
        return $this->is_active == 1 ? 'مفعل' : 'غير مفعل' ;
    }

 
}
