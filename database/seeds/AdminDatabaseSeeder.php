<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name'=>'Mohamed Apo Hieba',
            'email'=>'mohamed@gmail.com',
            'password'=>bcrypt('123456')
        ]);
 
        $admin->save();
    }
}
