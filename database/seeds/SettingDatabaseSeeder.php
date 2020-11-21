<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::setMany([
            'default_locale'        => 'ar',
            'default_timezone'      => 'Africa/Cairo',
            'reviews_enabled'       => true,
            'auto_approve_reviews'  => true,
            'supported_currencies'  => ['USD','LE','SAR'],
            'default_currency'      => 'USD',
            'store_email'           =>'mohamed@gmail.com',
            'search_engine'         =>'mysql',
            'local_shipping_cost'   => 0,
            'outer_shipping_cost'   => 0,
            'free_shipping_cost'    => 0,

            'translatable'=>[
                'store_name'            => 'Apo-Hieba Store',
                'free_shipping_lable'   =>'Free Shipping',
                'local_shipping_lable'  =>'Local Shipping',
                'outer_shipping_lable'  =>'Outer Shipping',
            ],

        ]);
    }
}
