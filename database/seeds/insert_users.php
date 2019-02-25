<?php

use Illuminate\Database\Seeder;

class insert_users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 3,
            'first_name'=> 'John',
            'last_name'=> 'Doe',
            'user_role' =>3,
            'email' => 'John@email.com',
            'password' => bcrypt('123456789'),
            'department_id' => 2,
            
            
        ]);
        DB::table('users')->insert([
            'id' => 33,
            'first_name'=> 'Ahmed',
            'last_name'=> 'Ali',
            'user_role' =>3,
            'email' => 'Ahmed@email.com',
            'password' => bcrypt('123456789'),
            'department_id' => 2,
            
            
        ]);

        DB::table('users')->insert([
            'id' => 342048733,
            'first_name'=> 'Souleiman',
            'last_name'=> 'Fadal',
            'user_role' =>5,
            'email' => 'Saul@email.com',
            'password' => bcrypt('123456789'),
            'department_id' => 1,
            
            
        ]);

        DB::table('users')->insert([
            'id' => 342049293,
            'first_name'=> 'Ibarhim',
            'last_name'=> 'Bamouqabil',
            'user_role' =>5,
            'email' => 'Ibrahim@email.com',
            'password' => bcrypt('123456789'),
            'department_id' => 1,
            
            
        ]);

        DB::table('users')->insert([
            'id' => 342048730,
            'first_name'=> 'Abdullah',
            'last_name'=> 'Sabar',
            'user_role' =>5,
            'email' => 'Abdullah@email.com',
            'password' => bcrypt('123456789'),
            'department_id' => 2,
            
            
        ]);

        DB::table('users')->insert([
            'id' => 342048777,
            'first_name'=> 'Moh',
            'last_name'=> 'Ahmed',
            'user_role' =>5,
            'email' => 'AHmh@email.com',
            'password' => bcrypt('123456789'),
            'department_id' => 2,
            
            
        ]);

        DB::table('users')->insert([
            'id' => 342048771,
            'first_name'=> 'Mohamed',
            'last_name'=> 'Atef',
            'user_role' =>5,
            'email' => 'Asvrh@email.com',
            'password' => bcrypt('123456789'),
            'department_id' => 21,
            
            
        ]);

        DB::table('users')->insert([
            'id' => 342048778,
            'first_name'=> 'Abdulrahman',
            'last_name'=> 'Salim',
            'user_role' =>5,
            'email' => 'AHwdvrmh@email.com',
            'password' => bcrypt('123456789'),
            'department_id' => 2,
            
            
        ]);


        DB::table('users')->insert([
            'id' => 2,
            'first_name'=> 'GPC',
            'last_name'=> 'GPC',
            'user_role' =>2,
            'email' => 'GPC@email.com',
            'password' => bcrypt('123456789'),
            
        ]);
    }
}
