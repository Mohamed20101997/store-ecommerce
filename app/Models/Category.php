<?php

namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;

    protected $with = ['translations'];

    protected $translatedAttributes = ['name'];

    protected $fillable = ['parent_id','slug','is_active'];

    protected $hidden = ['translations'];

    protected $casts = [

        'is_active' => 'boolean',
    ];


    public function getActive(){
        return $this->is_active == 1 ? 'مفعل' : 'غير مفعل' ;
    }

    //////// Scope

    public function scopeParent($q){
        return $q->whereNull('parent_id');
    }

     ////////  relations

         public function _parent()
        {
            return $this->belongsTo( self::class, 'parent_id');
        }

}
