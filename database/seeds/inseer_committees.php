<?php

use Illuminate\Database\Seeder;

class inseer_committees extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('committees')->insert([
            'id' => 1,
            'first_name'=> 'GPC',
            'last_name'=> 'GPC',
            
            'email' => 'GPC@email.com',
            'password' => bcrypt('123456789'),
            
        ]);

    }
}
