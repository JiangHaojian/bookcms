<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'administrator',
            'email' => '529602466@qq.com',
            'password' => bcrypt('adminadmin'),
            'type' => 0,
        ]);
    }
}
