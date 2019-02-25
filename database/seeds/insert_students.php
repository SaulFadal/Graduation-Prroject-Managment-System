<?php

use Illuminate\Database\Seeder;

class insert_students extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'id' => 342048733,
            'first_name'=> 'Souleiman',
            'last_name'=> 'Fadal',
            'phone'=> 539298148,
            'email' => 'Saul@email.com',
            'password' => bcrypt('123456789'),
            'group_id' => null,
            'department_id' => 1,
        ]);

        DB::table('students')->insert([
            'id' => 342049293,
            'first_name'=> 'Ibarhim',
            'last_name'=> 'Bamouqabil',
            'phone'=> 539298148,
            'email' => 'Ibrahim@email.com',
            'password' => bcrypt('123456789'),
            'group_id' => null,
            'department_id' => 1,
        ]);

        DB::table('students')->insert([
            'id' => 342048730,
            'first_name'=> 'Abdullah',
            'last_name'=> 'Sabar',
            'phone'=> 539298148,
            'email' => 'Abdullah@email.com',
            'password' => bcrypt('123456789'),
            'group_id' => null,
            'department_id' => 2,
        ]);

        DB::table('students')->insert([
            'id' => 342048778,
            'first_name'=> 'Abdulrahman',
            'last_name'=> 'Salim',
            'phone'=> 539298148,
            'email' => 'AHwdvrmh@email.com',
            'group_id' => null,
            'password' => bcrypt('123456789'),
            'department_id' => 2,
            
            
        ]);
        DB::table('students')->insert([
            'id' => 342048771,
            'first_name'=> 'Mohamed',
            'last_name'=> 'Atef',
            'phone'=> 539298148,
            'email' => 'Asvrh@email.com',
            'group_id' => null,
            'password' => bcrypt('123456789'),
            'department_id' => 1,
            
            
        ]);

        DB::table('students')->insert([
            'id' => 342048777,
            'first_name'=> 'Moh',
            'last_name'=> 'Ahmed',
            'phone'=> 539298148,
            'email' => 'AHmh@email.com',
            'group_id' => null,
            'password' => bcrypt('123456789'),
            'department_id' => 2,
            
            
        ]);
    }
}
