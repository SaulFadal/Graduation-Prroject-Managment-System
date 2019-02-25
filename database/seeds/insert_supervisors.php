<?php

use Illuminate\Database\Seeder;

class insert_supervisors extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supervisors')->insert([
            'id' => 3,
            'first_name'=> 'John',
            'last_name'=> 'Doe',
            'phone'=> 539298148,
            'email' => 'John@email.com',
            'password' => bcrypt('123456789'),
            'group_id' => null,
            'department_id' => 2,
        ]);
        DB::table('supervisors')->insert([
            'id' => 33,
            'first_name'=> 'Ahmed',
            'last_name'=> 'Ali',
            'phone'=> 539298148,
            'email' => 'Ahmed@email.com',
            'password' => bcrypt('123456789'),
            'group_id' => null,
            'department_id' => 1,
        ]);
    }
}
