<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Translatable,
        SoftDeletes;

        protected $with = ['translations'];

        protected $translatedAttributes  = ['name', 'description', 'short_description'];

        protected $fillable = [
            'brand_id',
            'slug',
            'sku',
            'price',
            'special_price',
            'special_price_type',
            'special_price_start',
            'special_price_end',
            'selling_price',
            'manage_stock',
            'qty',
            'in_stock',
            'is_active'
        ];

        protected $casts = [
            'manage_stock' => 'boolean',
            'in_stock' => 'boolean',
            'is_active' => 'boolean',
        ];


        protected $date = [
            'special_price_start',
            'special_price_end',
            'start_date',
            'end_date',
            'deleted_at',
        ];


        /////////////////////// functions  ////////////////
        public function getActive()
        {
            return $this->is_active == 1 ? 'مفعل' : 'غير مفعل' ;
        }

        //////////// relations //////////////////////

        public function brand(){
            return $this->belongsTo(Brand::class)->withDefault();
        }

        public function opti(){
            return $this->belongsTo(Brand::class)->withDefault();
        }

        public function categories(){

            return $this->belongsToMany(Category::class , 'product_categories');
        }

        public function tags()
        {
            return $this->belongsToMany(Tag::class, 'product_tags');
        }

        //////////// scope //////////////////////

        public function scopeActive($q){

            return $q->where('is_active', 1);
        }

        public function options()
        {
            return $this->hasMany(Option::class,'product_id');
        }
        
        public function images()
        {
            return $this->hasMany(Image::class, 'product_id');
        }
}
